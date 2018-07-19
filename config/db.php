<?php

// return [
//     'class' => 'yii\db\Connection',
//     'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//     'username' => 'root',
//     'password' => '',
//     'charset' => 'utf8',
// ];

return [
    'class' => 'yii\db\Connection',
    // 'dsn' => 'sqlsrv:Server=10.74.0.200\SOUT2017;Database=SOUT2017Sampel;ConnectionPooling=0',
    'dsn' => 'sqlsrv:Server=10.74.0.200\SUTAS2018;Database=SUTAS2018;ConnectionPooling=0',
    // 'dsn' => 'sqlsrv:Server=127.0.0.1\SAKERNAS2017;Database=SOUT2017Sampel;ConnectionPooling=0',
    // 'dsn' => 'sqlsrv:Server=127.0.0.1\sqlexpress;Database=SOUT2017Sampel;ConnectionPooling=0',
    'username' => 'supas_oye',
    'password' => 'supas_mei_5102-ok',
    'charset' => 'utf8',
];

// NEW SQL
// SELECT [kode_operator], [realname], COUNT([jumlah_entri]) as [count]
// FROM [SOUT2017Sampel].[dbo].[t_rt_tp]
// LEFT JOIN [SOUT2017Sampel].[dbo].[m_operator] 
// ON [SOUT2017Sampel].[dbo].[t_rt_tp].[kode_operator]=[SOUT2017Sampel].[dbo].[m_operator].[id_operator]
// GROUP BY [kode_operator], [realname], [flag_dok]
// HAVING [flag_dok]='spd'
// ORDER BY [count] OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY

