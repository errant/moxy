<?
namespace Moxy\Datasource;
/**
 * PDO Datasource Object
 *
 * @author  Tom Morton <tom@errant.me.uk>
 */
class PDO implements \Moxy\Interfaces\Datasource {

    protected $table;
    protected $pdo;
    protected $model;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function update($data, $whereSQL, $whereParams=array())
    {
        $columns = array_keys($data);
        $params = array_map(function($column) { return $column . ' = ?'; },$columns);
        // SQL
        $sql = 'UPDATE ' . $this->table . ' SET ' . implode(', ', $params) . ' ' . $whereSQL;
        $query = $this->pdo->prepare($sql);
        // PARAMS
        $query->execute(array_merge(array_values($data),$whereParams));
    }

    public function create($data)
    {
        $columns = array_keys($data);
        $params = array_map(function($column) { return '?'; },$columns);
        // SQL
        $sql = 'INSERT INTO ' . $this->table . '(' . implode(', ', $columns) . ') VALUES(' . implode(', ', $params) . ');';
        $query = $this->pdo->prepare($sql);
        // PARAMS
        $query->execute(array_values($data));
    }

    public function getArray($sql, $data)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' ' . $sql);
        $query->execute($data);

        if($query->rowCount() == 0) {
            return Null;
        }

        $models = array();
        foreach($query->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $model = new $this->model;
            $model->populate($row);
            $models[] = $model;
        }
        return $models;
    }

    public function getOne($sql, $data)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' ' . $sql);
        $query->execute($data);
        
        if($query->rowCount() == 0) {
            return Null;
        }

        $model = new $this->model;
        $model->populate($query->fetch(\PDO::FETCH_ASSOC));
        return $model;
    }

    public function delete($sql, $data)
    {
        $query = $this->pdo->prepare('DELETE FROM ' . $this->table . ' ' . $sql);
        $query->execute($data);
        
    }
}