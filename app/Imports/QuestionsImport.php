<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class QuestionsImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        //create Question where $row[0] not null

        if (isset($row[0])) {
            $question = Question::firstOrCreate(
                ['file_id' => 1, 'question' => $row[0]]
            );

            // Add question options where $row[$optionKey]  not null
            foreach ([1, 2, 3, 4] as $optionKey) {
                if (isset($row[$optionKey])) {
                    if (str_starts_with($row[$optionKey],"#")) {
                        $question->options()->create(['option' => $row[$optionKey],'correct'=>true]);
                    }else{
                        $question->options()->create(['option' => $row[$optionKey]]);
                    }
                }
            }
        }
    }
}
