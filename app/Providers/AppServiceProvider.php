<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Global Variables
        $departmentGroupOptions = [
            'Cmdo - Comando' => [
                '60' => 'Asse Cmdo - Assessoria do Comando',
                '35' => 'Subcmdo - Subcomando',
            ],
            'Subcmdo - Subcomando' => [
                '33' => 'APIC - Assessoria de Planejamento, Integração e Controle',
                '63' => 'Asse Ap As Jurd - Assessoria de Apoio Assuntos Jurídicos',
                '71' => 'Asse Coor Atv Prat Eng - Assessoria de Coordenação de Atividades Práticas de Engenharia',
                '72' => 'Asse Rel Ins - Assessoria de Relações Institucionais',
            ],
            'C Alu - Corpo de Alunos' => [
                '56' => '1ª Cia Alu - 1ª Companhia de Alunos',
                '57' => '2ª Cia Alu - 2ª Companhia de Alunos',
                '58' => '3ª Cia Alu - 3ª Companhia de Alunos',
            ],
            'Div Adm - Divisão Administrativa' => [
                '21' => 'Fisc Adm - Fiscalização Administrativa',
                '22' => 'Pref Mil - Prefeitura Militar',
                '79' => 'Sect Div Adm - Secretaria',
                '3' => 'St Aprov - Setor de Aprovisionamento',
                '62' => 'St Aqs Lctc Contr - Setor de Aquisições, Licitações Contrato',
                '27' => 'St Fin - Setor Financeiro',
                '2' => 'St Mat - Setor de Material',
            ],
            'Div Ens Pesq - Divisão de Ensino e Pesquisa' => [
                '4' => 'Bibl - Biblioteca',
                '151' => 'DIPA -  Divisão de inovação e pesquisa',
                '24' => 'SD/1 - Subdivisão de Cursos de Pós-Graduação',
                '25' => 'SD/2 - Subdivisão de Cursos de Graduação',
                '26' => 'SD/3 - Subdivisão de Concursos',
                '40' => 'SD/4 - Subdivisão de Pesquisa, Extensão e Inovação',
                '41' => 'SD/5 - Subdivisão de Ensino à Distância',
                '10' => 'SE/1 - Seção de Ensino Básico',
                '65' => 'SE/10 - Seção de Engenharia de Defesa',
                '11' => 'SE/2 - Seção de Engenharia de Fortificação e Construção',
                '12' => 'SE/3 - Seção de Engenharia Elétrica',
                '13' => 'SE/4 - Seção de Engenharia Mecânica',
                '14' => 'SE/5 - Seção de Engenharia Química',
                '15' => 'SE/6 - Seção de Engenharia Cartográfica',
                '16' => 'SE/7 - Seção de Engenharia Nuclear',
                '68' => 'SE/8 - Seção de Engenharia de Materiais',
                '17' => 'SE/9 - Seção de Engenharia de Computação',
                '69' => 'Seç Ap Adm - Seção de Apoio Administrativo',
                '32' => 'Seç M Aux - Seção de Meios Auxiliares',
                '23' => 'Seç Psc Pdg - Seção Psicopedagógica',
                '34' => 'Seç Tec Ens - Seção Técnica de Ensino',
            ],
            'Div Tecnl Info Com - Divisão de Tecnologia da Informação e Comunicações' => [
                '50' => 'Seç Infra - Seção de Infraestruturas',
                '52' => 'Seç Pjt - Seção de Projetos',
                '49' => 'Seç Sist - Seção de Sistemas',
                '51' => 'Seç Spt Tec - Seção de Suporte Técnico',
            ],
            'Gab - Gabinete' => [
                '5' => 'Cia C Sv - Companhia de Comando e Serviço',
                '1' => 'Seç Gab/1 - 1ª Seção do Gabinete',
                '30' => 'Seç Gab/2 - 2ª Seção do Gabinete',
                '67' => 'Seç Gab/3 - 3ª Seção do Gabinete',
                '70' => 'Seç Gab/4 - 4ª Seção do Gabinete',
                '7' => 'Seç Gab/5 - 5ª Seção do Gabinete',
                '29' => 'Seç Sau - Seção de Saúde',
            ],
            'Seç Gab/1 - 1ª Seção do Gabinete' => [
                '43' => 'S Seç Pes Civ - Subseção de Pessoal Civil',
                '42' => 'S Seç Pes Mil - Subseção de Pessoal Militar',
                '44' => 'S Seç Pg Pes - Subseção de Pagamento de Pessoal',
                '45' => 'Sect Ge - Secretaria Geral Protocolo Arquivo-Geral',
            ],
            'Seç Gab/5 - 5ª Seção do Gabinete' => [
                '39' => 'Nu TV - Núcleo de TV',
            ],
            'Seç Tec Ens - Seção Técnica de Ensino' => [
                '75' => 'SSAA - Subseção de Avaliação da Aprendizagem',
                '76' => 'SSP Pesq - Subseção de Planejamento e Pesquisa',
                '77' => 'SSRCA - Subseção de Registro Controle Acadêmico',
                '78' => 'SS Expt - Subseção de Expediente',
            ],
        ];
    
        $rankOptions = [
            1 => 'Soldado',
            2 => 'Cabo',
            3 => '3° Sargento',
            4 => '2° Sargento',
            5 => '1° Sargento',
            6 => 'Subtenente',
            7 => 'Aluno 1º Ano',
            8 => 'Aluno 2º Ano',
            9 => 'Aluno 3º Ano',
            10 => 'Aluno 4º Ano',
            11 => 'Aspirante',
            12 => '2° Tenente',
            13 => '1° Tenente',
            14 => 'Capitão',
            15 => 'Major',
            16 => 'Tenente-Coronel',
            17 => 'Coronel',
        ];

        $departmentOptions = [
            '60' => 'Asse Cmdo - Assessoria do Comando',
            '35' => 'Subcmdo - Subcomando',
            '33' => 'APIC - Assessoria de Planejamento, Integração e Controle',
            '63' => 'Asse Ap As Jurd - Assessoria de Apoio Assuntos Jurídicos',
            '71' => 'Asse Coor Atv Prat Eng - Assessoria de Coordenação de Atividades Práticas de Engenharia',
            '72' => 'Asse Rel Ins - Assessoria de Relações Institucionais',
            '56' => '1ª Cia Alu - 1ª Companhia de Alunos',
            '57' => '2ª Cia Alu - 2ª Companhia de Alunos',
            '58' => '3ª Cia Alu - 3ª Companhia de Alunos',
            '21' => 'Fisc Adm - Fiscalização Administrativa',
            '22' => 'Pref Mil - Prefeitura Militar',
            '79' => 'Sect Div Adm - Secretaria',
            '3' => 'St Aprov - Setor de Aprovisionamento',
            '62' => 'St Aqs Lctc Contr - Setor de Aquisições, Licitações Contrato',
            '27' => 'St Fin - Setor Financeiro',
            '2' => 'St Mat - Setor de Material',
            '4' => 'Bibl - Biblioteca',
            '151' => 'DIPA - Divisão de inovação e pesquisa',
            '24' => 'SD/1 - Subdivisão de Cursos de Pós-Graduação',
            '25' => 'SD/2 - Subdivisão de Cursos de Graduação',
            '26' => 'SD/3 - Subdivisão de Concursos',
            '40' => 'SD/4 - Subdivisão de Pesquisa, Extensão e Inovação',
            '41' => 'SD/5 - Subdivisão de Ensino à Distância',
            '10' => 'SE/1 - Seção de Ensino Básico',
            '65' => 'SE/10 - Seção de Engenharia de Defesa',
            '11' => 'SE/2 - Seção de Engenharia de Fortificação e Construção',
            '12' => 'SE/3 - Seção de Engenharia Elétrica',
            '13' => 'SE/4 - Seção de Engenharia Mecânica',
            '14' => 'SE/5 - Seção de Engenharia Química',
            '15' => 'SE/6 - Seção de Engenharia Cartográfica',
            '16' => 'SE/7 - Seção de Engenharia Nuclear',
            '68' => 'SE/8 - Seção de Engenharia de Materiais',
            '17' => 'SE/9 - Seção de Engenharia de Computação',
            '69' => 'Seç Ap Adm - Seção de Apoio Administrativo',
            '32' => 'Seç M Aux - Seção de Meios Auxiliares',
            '23' => 'Seç Psc Pdg - Seção Psicopedagógica',
            '34' => 'Seç Tec Ens - Seção Técnica de Ensino',
            '50' => 'Seç Infra - Seção de Infraestruturas',
            '52' => 'Seç Pjt - Seção de Projetos',
            '49' => 'Seç Sist - Seção de Sistemas',
            '51' => 'Seç Spt Tec - Seção de Suporte Técnico',
            '5' => 'Cia C Sv - Companhia de Comando e Serviço',
            '1' => 'Seç Gab/1 - 1ª Seção do Gabinete',
            '30' => 'Seç Gab/2 - 2ª Seção do Gabinete',
            '67' => 'Seç Gab/3 - 3ª Seção do Gabinete',
            '70' => 'Seç Gab/4 - 4ª Seção do Gabinete',
            '7' => 'Seç Gab/5 - 5ª Seção do Gabinete',
            '29' => 'Seç Sau - Seção de Saúde',
            '43' => 'S Seç Pes Civ - Subseção de Pessoal Civil',
            '42' => 'S Seç Pes Mil - Subseção de Pessoal Militar',
            '44' => 'S Seç Pg Pes - Subseção de Pagamento de Pessoal',
            '45' => 'Sect Ge - Secretaria Geral Protocolo Arquivo-Geral',
            '39' => 'Nu TV - Núcleo de TV',
            '75' => 'SSAA - Subseção de Avaliação da Aprendizagem',
            '76' => 'SSP Pesq - Subseção de Planejamento e Pesquisa',
            '77' => 'SSRCA - Subseção de Registro Controle Acadêmico',
            '78' => 'SS Expt - Subseção de Expediente',
        ];

        $mealOptions = [
            '1' => 'Café',
            '2' => 'Almoço',
            '3' => 'Janta',
        ];
        
        //this share the global variables above with every blade file!
        view()->share('rankOptions', $rankOptions);
        view()->share('departmentOptions', $departmentOptions);
        view()->share('departmentGroupOptions', $departmentGroupOptions);
        view()->share('mealOptions', $mealOptions);
    }
}
