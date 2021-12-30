<?php
namespace Service{

    use Model\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService{
        public function showTodo():void;
        public function insertTodo(string $todo):void;
        public function updateTodo(int $id, string $todo):void;
        public function deleteTodo(int $number):void;
        public function resetTodo():void;
    }

    class TodolistServiceImpl implements TodolistService{
        public function __construct(private TodolistRepository $todolistRepository)
        {
            
        }

        public function showTodo(): void
        {
            echo "TodoList" . PHP_EOL;
            
            $todolist = $this->todolistRepository->show();
            
            foreach($todolist as $value){
                echo "{$value->getId()}. {$value->getTodo()}" . PHP_EOL;
            }
        }

        public function insertTodo(string $todo): void
        {
            $todolist = new Todolist(todo: $todo);
            
            $this->todolistRepository->insert($todolist);
            echo "Berhasil menambah Todo" . PHP_EOL;
        }

        public function updateTodo(int $id, string $todo): void
        {
            $dataID = new Todolist(id: $id);
            $dataTODO = new Todolist(todo: $todo);

            $this->todolistRepository->update($dataID, $dataTODO);
            echo "Berhasil memperbarui Todo" . PHP_EOL;
        }

        public function deleteTodo(int $number): void
        {
            $success = $this->todolistRepository->delete($number);

            if($success){
                echo "Todo no $number berhasil dihapus" . PHP_EOL;
            }else{
                echo "Todo no $number tidak dikenal" . PHP_EOL;
            }
        }

        public function resetTodo(): void
        {
            $this->todolistRepository->reset();
        }
    }
}
?>