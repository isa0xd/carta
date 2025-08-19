<?php

class CartaPokemon
{
    private $numeroPokedex;
    private $nome;
    private $tipo;
    private $raridade;

    public function __toString()
    {
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

    public function getNumeroPokedex()
    {
        return $this->numeroPokedex;
    }

    public function setNumeroPokedex($numeroPokedex): self
    {
        $this->numeroPokedex = $numeroPokedex;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;
        return $this;
    }
}

// Criando cartas Pokémon com os Pokémon que você escolheu
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

echo "BEM VINDO AO JOGO DAS CARTAS POKÉMON!!!!\n\n";
echo "Cartas disponíveis:\n";

foreach ($cartas as $carta) {
    echo $carta;
}

$tentativas = 0;

do {
    $palpite = readline("\nDigite algum número da Pokédex para tentar acertar a carta sorteada: ");
    $tentativas++;

    if ((int)$palpite === $cartaSorteada->getNumeroPokedex()) {
        echo "\nVocê acertou!\n";
        echo "Carta sorteada: " . $cartaSorteada;
        echo "Tentativas: $tentativas\n";
        break;
    } else {
        echo "Tente novamente.\n";
    }
} while (true);
