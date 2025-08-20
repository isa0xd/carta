<?php

class CartaPokemon
{
    private int $numeroPokedex;
    private string $nome;
    private $tipo;
    private $raridade;

    public function __toString()
    {
    	//"sprintf" é uma função usada para formatar strings de maneira dinâmica e flexível
        return sprintf(
            "Número Pokédex: %s | Nome: %s | Tipo: %s | Raridade: %s.\n",
            $this->numeroPokedex,
            $this->nome,
            $this->tipo,
            $this->raridade
        );
    }

    public function getRaridade()
    {
        return $this->raridade;
    }

    public function setRaridade($raridade): self
    {
        $this->raridade = $raridade;
        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getNumeroPokedex(): int
    {
        return $this->numeroPokedex;
    }

    public function setNumeroPokedex(int $numeroPokedex): self
    {
        $this->numeroPokedex = $numeroPokedex;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }
}

$pikachu = new CartaPokemon();
$pikachu->setNumeroPokedex(25)->setNome("Pikachu")->setTipo("Elétrico")->setRaridade("Comum");

$sceptile = new CartaPokemon();
$sceptile->setNumeroPokedex(254)->setNome("Sceptile")->setTipo("Grama")->setRaridade("Raro");

$mewtwo = new CartaPokemon();
$mewtwo->setNumeroPokedex(150)->setNome("Mewtwo")->setTipo("Psíquico")->setRaridade("Lendário");

$caterpie = new CartaPokemon();
$caterpie->setNumeroPokedex(10)->setNome("Caterpie")->setTipo("Inseto")->setRaridade("Comum");

$gengar = new CartaPokemon();
$gengar->setNumeroPokedex(94)->setNome("Gengar")->setTipo("Fantasma/Veneno")->setRaridade("Épico");

$blaziken = new CartaPokemon();
$blaziken->setNumeroPokedex(257)->setNome("Blaziken")->setTipo("Fogo/Luta")->setRaridade("Raro");

$ditto = new CartaPokemon();
$ditto->setNumeroPokedex(132)->setNome("Ditto")->setTipo("Normal")->setRaridade("Lendário");

$cartas = [$pikachu, $sceptile, $mewtwo, $caterpie, $gengar, $blaziken, $ditto];

$cartaSorteada = $cartas[array_rand($cartas)];

echo "Bem vindo ao jogo das cartas de pokémon!!\n\n";
echo "As cartas disponíveis são:\n";

foreach ($cartas as $carta) {
    echo $carta;
}

$tentativas = 0;
$pontuacao = 80; //pontos iniciais

do {
    $palpite = readline("\nDigite algum número da Pokédex para tentar acertar a carta sorteada ou digite 'sair' para desistir: ");
    
    //opção de desistir
    //"strtolower" serve para converter uma string em letras minusculas, por ex. se o usuario digitar "SAIR" ou "sAir" ele transforma em "sair" antes de comparar
    if (strtolower($palpite) === "sair") {
        echo "\nAh que pena, você desistiu do jogo...\n";
        echo "A carta sorteada era: " . $cartaSorteada;
        break;
    }
    
    $tentativas++;

    if ((int)$palpite === $cartaSorteada->getNumeroPokedex()) {
        echo "\nVocê acertou!\n";
        echo "Carta sorteada: " . $cartaSorteada;
        echo "Tentativas: $tentativas\n";
        echo "Pontuação final: $pontuacao pontos\n";
        break;
    } else {
        echo "Não é essa, tente novamente.\n";
        $pontuacao -= 10; //perde 10pts a cada erro
        if ($pontuacao < 0) {
            $pontuacao = 0;
        }
    }
} while (true);
