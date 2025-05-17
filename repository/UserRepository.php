<?php





class UserRepository{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    

    public function _procurarPorEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ? $this->mapRowToEntity($row) : null;
    }

    


}