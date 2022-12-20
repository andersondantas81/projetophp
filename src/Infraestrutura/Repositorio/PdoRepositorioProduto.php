<?php

    namespace Anderson\Comercial\Infraestrutura\Repositorio;

    use Anderson\Comercial\Dominio\Modelo\Produto;
    use Anderson\Comercial\Dominio\Repositorio\RepositorioProdutos;
    use Anderson\Comercial\Persistencia;
    use PDO;

    class PdoRepositorioProduto implements RepositorioProdutos {
        private PDO $conexao;

        public  function __construct(PDO $conexao) {
            $this->conexao = $conexao;
        }

        public function todosProdutos(): array {

            $sql = "SELECT * FROM produto";
            $stmt = $this->conexao->query($sql);
            return $this->hidratarListaProdutos($stmt);

        }
        public function salvar(Produto $produto): bool {
            if($produto->getIdProduto() === null ) {
                return $this->createProduto($produto);
            }
        }
        public function createProduto(Produto $produto): bool { 
            $sqlInsert = "INSERT INTO produto (nomeProduto, precoProduto) VALUES (:nome, :preco);";
            $stmt = $this->conexao->prepare($sqlInsert);
            $stmt->bindValue(':nome', $produto->getProduto(), PDO::PARAM_STR));
            $stmt->bindValue(':preco', $produto->getPreco(), PDO::PARAM_STR); 
            $sucesso = $stmt->execute();
            
            if($sucesso) {
                $produto->setIdProduto($this->conexao->lastInsertId());
            }
            
            return $sucesso;
        }
        public function readProduto(Produto $produto): array {
            $sqlConsulta = "SELECT * FROM produto WHERE idProduto = :id;";
            $stmt = $this->conexao->prepare($sqlConsulta);
            $stmt->bindValue(":id", $produto->getIdProduto(), PDO::PARAM_INT);
            $stmt->execute();
            
            return $this->hidratarListaProdutos($stmt);
        }
        public function updateProduto(Produto $produto): bool {
            $sqlUpdate = "UPDATE produto SET nomeProduto = :nome, precoProduto = :preco WHERE idProduto = :id;";
            $stmt = $this->conexao->prepare($sqlUpdate);
            $stmt->bindValue(':nome', $produto->getProduto(), PDO::PARAM_STR); 
            $stmt->bindValue(':preco', $produto->getPreco(), PDO::PARAM_STR); 
            $stmt->bindValue(':id', $produto->getIdProduto(), PDO::PARAM_STR); 
            
            return $stmt->execute();
        }
        public function deleteProduto(Produto $produto): bool {
            $stmt = $this->conexao->prepare('DELETE FROM produto WHERE idProduto = ?;');
            $stmt->bindValue(1, $produto->getIdProduto(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        //Hidratar os dados
        public function hidratarListaProdutos(\PDOStatement $stmt): array {
            $listaDadosProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $listaProdutos = [];

            echo "<table>";
            foreach ($listaDadosProdutos as $dadosProduto) {
                $listaProdutos[] = new Produto(
                    $dadosProduto['idProduto'],
                    $dadosProduto['nomeProduto'],
                    $dadosProduto['precoProduto']
                );
                echo "
                <tr>
                    <td width='20'>
                        {$dadosProduto['idProduto']}
                    </td>
                    <td width='150'>
                        {$dadosProduto['nomeProduto']}
                    </td align='right'>
                        ".number_format($dadosProduto['precoProduto'], 2, ',', '.')."
                    </td>
                </tr>";
            }
            echo "</table>";

            return $listaDadosProdutos;
        }
    }
