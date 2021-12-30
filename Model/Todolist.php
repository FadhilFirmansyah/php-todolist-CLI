<?php
namespace Model{
    class Todolist{
        public function __construct(private ?int $id = null,
                                    private string $todo = "")
        {
            
        }

        public function getId():int{
            return $this->id;
        }

        public function setId(int $id):void{
            $this->id = $id;
        }

        public function getTodo():string{
            return $this->todo;
        }

        public function setTodo(string $todo):void{
            $this->todo = $todo;
        }
    }
}
?>