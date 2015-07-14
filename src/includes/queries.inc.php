<?php

$queries['membros'] = "SELECT
        CodMembro,
        NomeMembro,
        DataNascMembro,
        strftime('%Y', 'now') - strftime('%Y', DataNascMembro) AS idade,
        eMailMembro,
        FotoMembro
    FROM
        tblmembros
    ORDER BY
        NomeMembro";

$queries['aniversariantes'] = "SELECT
            CodMembro,
            NomeMembro,
            DataNascMembro,
            strftime('%Y', 'now') - strftime('%Y', DataNascMembro) AS idade,
            eMailMembro,
            FotoMembro
        FROM
            tblmembros
        WHERE
            strftime('%d-%m', 'now') = strftime('%d-%m', DataNascMembro)
        ORDER BY
            NomeMembro";
