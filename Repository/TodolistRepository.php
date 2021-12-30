<?php
namespace Repository{

    use Model\Todolist;
    use PDO;

    interface TodolistRepository{
        public function show():array;
        public function insert(Todolist $todolist):void;
        public function update(Todolist $id, Todolist $todo):void;
        public function delete(int $number):void;
        public function reset():void;
    }

    class TodolistRepositoryImpl implements TodolistRepository{
        public function __construct(private PDO $conn)
        {
            
        }

        public function show(): array
        {
            $sql = "SELECT * FROM todolist";
            $stats = $this->conn->prepare($sql);
            $stats->execute();

            $datas = [];

            foreach($stats as $todo){
                $todolist = new Todolist();
                $todolist->setId($todo["id"]);
                $todolist->setTodo($todo["todo"]);

                $datas[] = $todolist;
            }

            return $datas;
        }

        public function insert(Todolist $todolist): void
        {
            $sql = "INSERT INTO todolist(todo) VALUES(?)";
            $stats = $this->conn->prepare($sql);
            $stats->execute([$todolist->getTodo()]);
        }

        public function update(Todolist $id, Todolist $todo): void
        {
            $sql = "UPDATE todolist SET todo = ? WHERE id = ?";
            $stats = $this->conn->prepare($sql);
            $stats->execute([$todo->getTodo(), $id->getId()]);
        }

        public function delete(int $number): void
        {
            $sql = "DELETE FROM todolist WHERE id = ?";
            $stats = $this->conn->prepare($sql);
            $stats->execute([$number]);
        }

        public function reset(): void
        {
            $sql = "TRUNCATE TABLE todolist";
            $stats = $this->conn->prepare($sql);
            $stats->execute();
        }
    }
}
?>