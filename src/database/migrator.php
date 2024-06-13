<?php

namespace UserColors\database;

use Exception;

class migrator
{
    // Função para executar migrações
    public static function migrate()
    {
        try {
            $migracoes = glob(__DIR__ . '/migrations/*.sql');

            foreach ($migracoes as $migracao) {
                $sql = file_get_contents($migracao);

                $connection = new Connection();
                $connection->query($sql);

                echo "Migração $migracao concluída.\n";
            }

            echo "Todas as migrações foram executadas com sucesso!\n";
        } catch (Exception $e) {
            echo "Erro ao executar as migrações: " . $e->getMessage() . "\n";
        }
    }

    public static function seed()
    {
        try {
            $seeds = glob(__DIR__ . '/seeds/*.sql');
            foreach ($seeds as $seed) {
                $sql = file_get_contents($seed);
                $connection = new Connection();
                $connection->query($sql);

                echo "Migração $seed concluída.\n";
            }

            echo "Todas as seeds foram executadas com sucesso!\n";
        } catch (Exception $e) {
            echo "Erro ao executar as seeds: " . $e->getMessage() . "\n";
        }
    }
}
