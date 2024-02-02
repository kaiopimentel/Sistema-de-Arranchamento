<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arranchamento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class ArranchamentoController extends Controller
{
    protected $mealMapping = [
        'cafe' => 1,
        'almoco' => 2,
        'janta' => 3,
    ];

    public function index()
    {
        $userId = auth()->id(); // Obtenha o ID do usuário autenticado
        $arranchamentos = Arranchamento::where('user_id', $userId)
                                        ->where('status', true)
                                        ->get();
    
        // Preparar um array para fácil acesso na view
        $arranchados = [];
        foreach ($arranchamentos as $arranchamento) {
            $dataFormatada = $arranchamento->date; // Agora 'date' é um objeto Carbon
            $arranchados[$arranchamento->meal_type][$dataFormatada] = true;
        }
    
        return view('index', compact('arranchados'));
    }

    public function dashboard(Request $request)
    {        
        $agrupamento = $request->input('agrupar_por', 'default'); 
        $startDate = now();
        $endDate = now()->addDays(30);
    
        $query = Arranchamento::join('users', 'arranchamentos.user_id', '=', 'users.id')
                              ->whereBetween('arranchamentos.date', [$startDate, $endDate]);
    
        if ($agrupamento === 'secao') {
            $dados = $query->select('arranchamentos.date', 'arranchamentos.meal_type', 'users.department', DB::raw('group_concat(users.name, "-", users.rank) as user_details'))
                           ->groupBy('arranchamentos.date', 'arranchamentos.meal_type', 'users.department');
        } elseif ($agrupamento === 'patente') {
            $dados = $query->select('arranchamentos.date', 'arranchamentos.meal_type', 'users.rank', DB::raw('group_concat(users.name, "-", users.department) as user_details'))
                           ->groupBy('arranchamentos.date', 'arranchamentos.meal_type', 'users.rank');
        } else {
            $dados = $query->select('arranchamentos.date', 'arranchamentos.meal_type', DB::raw('count(*) as total'))
                           ->groupBy('arranchamentos.date', 'arranchamentos.meal_type');
        }
    
        $dados = $dados->get();
    
        return view('dashboard-arranchamento', compact('dados', 'agrupamento'));
    }
    
    
    
    public function store(Request $request)
    {
        $userId = auth()->id(); // Obtenha o ID do usuário autenticado
        $arranchamentos = Arranchamento::where('user_id', $userId)
                                        ->where('status', true)
                                        ->get();
    
        // Mapeamento de tipos de refeição
        $this->mealMapping = [
            'cafe' => 1,
            'almoco' => 2,
            'janta' => 3,
        ];
    
        // Preparar um array para fácil acesso na view
        $arranchados = [];
        foreach ($arranchamentos as $arranchamento) {
            $arranchados[$arranchamento->meal_type][$arranchamento->date] = true;
        }
    
        foreach ($request->all() as $key => $value) {
            if (preg_match('/(cafe|almoco|janta)_(\d{4}-\d{2}-\d{2})_hidden/', $key, $matches)) {
                $mealType = $this->mealMapping[$matches[1]];
                $date = $matches[2];
    
                $checkboxName = $matches[1] . '_' . $matches[2];
                $checkboxValue = $request->has($checkboxName);
                
                $oldValue = $arranchados[$mealType][$date] ?? false;
                //TODO: update remarks with values passed from blade
                $remarks = '1';
                if ($oldValue != $checkboxValue) {
                    Arranchamento::updateOrCreate(
                        ['user_id' => $userId, 'date' => $date, 'meal_type' => $mealType],
                        ['status' => $checkboxValue, 'remarks' => $remarks],
                    );
                }
            }
        }
    
        return redirect()->back()->with('success', 'Arranchamento atualizado com sucesso!');
    }
    
    
    
    public function updateStatus(Request $request, $id)
    {
        $arranchamento = Arranchamento::findOrFail($id);
        $arranchamento->status = $request->has('arranchar'); // Diretamente como booleano
        $arranchamento->save();
    
        return redirect()->back()->with('success', 'Status de arranchamento atualizado com sucesso!');
    }
    
}
