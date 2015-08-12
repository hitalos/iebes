<?php

$queries['membros'] = "SELECT
        CodMembro,
        NomeMembro,
        DataNascMembro,
        (strftime('%Y', 'now') - strftime('%Y', DataNascMembro)) - (strftime('%m%d', 'now') < strftime('%m%d', DataNascMembro)) AS idade,
        eMailMembro,
        SituacaoMembro,
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
            SituacaoMembro,
            FotoMembro
        FROM
            tblmembros
        WHERE
            strftime('%d-%m', 'now') = strftime('%d-%m', DataNascMembro)
        ORDER BY
            NomeMembro";
