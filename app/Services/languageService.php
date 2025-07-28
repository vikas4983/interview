<?php

namespace App\Services;

use App\Models\QuestionAnswer;

class languageService
{

    public function getcources()
    {
        $data = QuestionAnswer::all();
        $courseName = [
            'c' => 'c',
            'c++' => 'c++',
            'c#' => 'c#',
            'java' => 'java',
            'python' => 'python',
            'php' => 'php',
            'laravel' => 'laravel',
            'react Js' => 'react Js',
            'reactJs' => 'reactJs',
            'javascript' => 'javascript',
            'java script' => 'java script',
            'typescript' => 'typescript',
            'type script' => 'type script',
            'swift' => 'swift',
            'kotlin' => 'kotlin',
            'go' => 'go',
            'rust' => 'rust',
            'ruby' => 'ruby',
            'perl' => 'perl',
            'scala' => 'scala',
            'dart' => 'dart',
            'objectivec' => 'objectivec',
            'objective c' => 'objective c',
            'r' => 'r',
            'elixir' => 'elixir',
            'haskell' => 'haskell',
            'lua' => 'lua',
            'julia' => 'julia',
            'vb.net' => 'vb.net',
            'html' => 'html',
            'css' => 'css',
            'sql' => 'sql',
            'bash' => 'bash',
            'shell' => 'shell',
            'powershell' => 'powershell',
            'power shell' => 'power shell',
            'json' => 'json',
            'xml' => 'xml',
            'yaml' => 'yaml',
            'markdown' => 'markdown',
            'graph ql' => 'graph ql',
            'graphql' => 'graphql',
            'matlab' => 'matlab',
            'sas' => 'sas',
            'vhdl' => 'vhdl',
            'verilog' => 'verilog',
            'system verilog' => 'system verilog',
            'systemverilog' => 'systemverilog',
            'solidity' => 'solidity',
            'vyper' => 'vyper'
        ];
        $addCourse = [];
        foreach ($data as $value) {
            if (in_array($value->language, $courseName)) {
                $addCourse[$value->language][] = $value;
            }
        }

        return   $addCourse;
    }
}
