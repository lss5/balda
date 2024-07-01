<?php

namespace App\Services;

use App\Models\Word;

class BestWordService
{
    public array $table;
    protected int $size;

    public array $words = [];
    
    public array $stack;
    public array $visited;
    public string $letters;

    public function __construct(array $table)
    {
        $this->table = $table;
        $this->size = count($this->table); // 6
    }

    public function find()
    {
        foreach ($this->table as $key_row => $row) {
            foreach ($row as $key_col => $value) {
                if (empty($value)) {
                    continue;
                }

                $this->letters = '';
                $this->stack = [];
                $this->visited = [];

                $this->stack[] = [['row' => $key_row, 'col' => $key_col], $this->letters];
                $this->dfs();
            }
        }
        return $this->words;
    }

    public function dfs()
    {
        while (! empty($this->stack)) {
            $stk = array_pop($this->stack);
            $this->visited[] = $v = $stk[0];
            $this->letters = $stk[1];

            $this->letters .= $this->table[$v['row']][$v['col']];

            if (strlen($this->letters) > 1) {
                $like_word = Word::where('name', 'LIKE', $this->letters.'%')->get();

                if ($like_word->count() < 1) {
                    continue;
                }

                $word = Word::where('name', 'LIKE', $this->letters)->pluck('name')->first();
                if ($word) {
                    $this->words[] = $word;
                    return $word;
                }
            }

            $new_trace = true;
            // array stack [next point, letters on this point, current point]
            if ($up = $this->up($v['row'], $v['col'])) {
                if (! in_array($up, $this->visited)) {
                    $this->stack[] = [$up, $this->letters, $v];
                    $new_trace = false;
                }
            }
            if ($right = $this->right($v['row'], $v['col'])) {
                if (! in_array($right, $this->visited)) {
                    $this->stack[] = [$right, $this->letters, $v];
                    $new_trace = false;
                }
            }
            if ($down = $this->down($v['row'], $v['col'])) {
                if (! in_array($down, $this->visited)) {
                    $this->stack[] = [$down, $this->letters, $v];
                    $new_trace = false;
                }
            }
            if ($left = $this->left($v['row'], $v['col'])) {
                if (! in_array($left, $this->visited)) {
                    $this->stack[] = [$left, $this->letters, $v];
                    $new_trace = false;
                }
            }
    
            if ($new_trace) {
                $count = count($this->visited);
                if (count($this->stack) > 0) {
                    $stk_last = $this->stack[array_key_last($this->stack)];
    
                    for ($count; $count > 0; $count--) {
                        $last_visited = array_pop($this->visited);
                        if (! array_diff_assoc($last_visited, $stk_last[2])) {
                            $this->visited[] = $last_visited;
                            break;
                        }
                    }
                }
    
            }
        }
    }

    // TODO: replace check point functions (up, down, left, right) on one base function
    /**
     * @return array coordinates
     */
    public function up($row, $col)
    {
        if ($row - 1 < 0) {
            return false;
        }

        $up = ['row' => $row - 1, 'col' => $col];

        if (empty($this->table[$up['row']][$up['col']])) {
            return false;
        }
        
        return $up;
    }

    /**
     * @return array coordinates
     */
    public function down($row, $col)
    {
        if ($row + 1 > $this->size - 1) {
            return false;
        }

        $down = ['row' => $row + 1, 'col' => $col];

        if (empty($this->table[$down['row']][$down['col']])) {
            return false;
        }
        
        return $down;
    }

    /**
     * @return array coordinates
     */
    public function left($row, $col)
    {
        if ($col - 1 < 0) {
            return false;
        }

        $left = ['row' => $row, 'col' => $col - 1];

        if (empty($this->table[$left['row']][$left['col']])) {
            return false;
        }

        return $left;
    }

    /**
     * @return array coordinates
     */
    public function right($row, $col)
    {
        if ($col + 1 > $this->size - 1) {
            return false;
        }

        $right = ['row' => $row, 'col' => $col + 1];

        if (empty($this->table[$right['row']][$right['col']])) {
            return false;
        }
        
        return $right;
    }

    public function check($letters)
    {
        return false;
    }

}
