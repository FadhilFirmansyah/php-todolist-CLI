<?php
namespace View{

    use Service\TodolistService;
    use Util\Helper;

class TodolistView{
        public function __construct(private TodolistService $todolistService)
        {
            
        }

        public function showTodoList():void{
            while(true){
                $this->todolistService->showTodo();

                echo <<< LIST
                
                [--------MENU--------]
                (1) Menambah Todo
                (2) Memperbarui Todo
                (3) Menghapus Todo

                (0) RESET
                (x) KELUAR

                LIST;

                $menu = Helper::input("Pilihan");

                if($menu == "1"){
                    $this->insertTodoList();
                }elseif($menu == "2"){
                    $this->updateTodoList();
                }elseif($menu == "3"){
                    $this->deleteTodoList();
                }elseif($menu == "0"){
                    $this->resetTodoList();
                }elseif($menu == "x"){
                    break;
                }else{
                    echo "Pilihan menu tidak dimengerti" . PHP_EOL;
                }
            }
            echo "Sayonara!!!" . PHP_EOL;
        }

        public function insertTodoList():void{
            echo "Menambah TodoList" . PHP_EOL;

            $todo = Helper::input("Todo (x untuk batal)");

            if($todo == "x"){
                echo "Batal menambah Todo" . PHP_EOL;
            }else{
                $this->todolistService->insertTodo($todo);
            }
        }

        public function updateTodoList():void{
            echo "Memperbarui TodoList" . PHP_EOL;

            $todoId = Helper::input("Nomor Todo (x untuk batal)");

            if($todoId == "x"){
                echo "Batal memperbarui Todo" . PHP_EOL;
            }else{
                $todoTodo = Helper::input("Todo (x untuk batal)");

                if($todoTodo == "x"){
                    echo "Batal memperbarui Todo" . PHP_EOL;
                }else{
                    $this->todolistService->updateTodo($todoId, $todoTodo);
                }
            }
        }

        public function deleteTodoList():void{
            echo "Menghapus TodoList" . PHP_EOL;

            $number = Helper::input("Nomor Todo (x untuk batal)");

            if($number == "x"){
                echo "Batal menghapus Todo" . PHP_EOL;
            }else{
                $this->todolistService->deleteTodo($number);
            }
        }

        public function resetTodoList():void{
            echo "RESET TodoList" . PHP_EOL;

            while (true) {
                $select = Helper::input("Anda yakin ingin mereset TodoList? (y/n)");

                if($select == "y"){
                    echo "TodoList berhasil direset" . PHP_EOL;
                    $this->todolistService->resetTodo();
                    break;
                }elseif($select == "n"){
                    echo "TodoList batal direset" . PHP_EOL;
                    break;
                }else{
                    echo "Tolong pilih antara y/n" . PHP_EOL;
                }
            }
        }
    }
}
?>