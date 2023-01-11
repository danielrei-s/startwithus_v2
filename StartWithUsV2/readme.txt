
Download php (já devem ter)
Download e instalar o XAMPP.


XAMPP Pode necessitar de algumas alterações aos seus ficheiros,
ver conforme os erros.
Iniciar o XAMPP e fazer Start em Apache (server) e MySQL(BD)

Download https://github.com/danielrei-s/startwithus_v2
Colonar o projeto do git para dentro da pasta C:\xampp\htdocs\

Abrir browser e colar http://localhost/dashboard/
Carregar em phpmyadmin (topo)

Isto é a base de dados.
Carregar em criar nova base de dados (topo esquerdo)
Dar nome de startwithusdb (copiar e colar, o nome n pode falhar)
Entrar na bd e carregar em SQL (segunda aba)

Dentro da pasta do git existe um ficheiro chamado "geredb"
Abrir(com notepad++ etc)
Copiar desde Create table até commit.
Não colocar o "commit". Carregar Go (canto inferior).

Neste ponto o servidor está live a base de dados também. 

Entrar em: http://localhost/swu_v2/StartWithUsV2/

Para além de toda a pagina existem várias subpags
Pag para criar utilizador: http://localhost/swu_v2/StartWithUsV2/create.php
pag para login: http://localhost/swu_v2/StartWithUsV2/login.php

Conforme podem verificar na bd existe já dois logins, usar o login admin@ispgaya.pt pw: admin

Explorem todo o site. Se encontrarem erros podem dar fix e commit. 
