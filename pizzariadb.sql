create database pizzariadb;

use pizzariadb;

CREATE TABLE `tb_categoria` (
  `cdcategoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`cdcategoria`, `nome`) VALUES
(1, 'Pizza'),
(2, 'Calzone'),
(3, 'Hambúrguer'),
(4, 'Bebida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cdcliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `endereco` varchar(80) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(80) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`cdcliente`, `nome`, `sobrenome`, `telefone`, `cep`, `estado`, `cidade`, `bairro`, `endereco`, `numero`, `complemento`, `email`, `senha`) VALUES
(1, 'Alexandre', 'Araújo', '91984188928', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alexandre@gmail.com', '7599636975073a6f9238316cd7856663'),
(2, 'João Paulo', 'Costa', '91754395984', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'joao.paulo@gmail.com', 'a966390ad00cd1f1ff0c71917b514116'),
(3, 'ivo', 'miranda', '91982428090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ivoomiranda@gmail.com', 'e9148a7c30467a6bf327c1db7fdbfc99'),
(4, 'mayara', 'suany', '91982910511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mayarasuany.ms@gmail.com', 'e2c8620c1e1216a49527788d35df251c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `cdendereco` int(11) NOT NULL,
  `endereco` varchar(8) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `complemento` varchar(80) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `clienteid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `cdfuncionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `cdcargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`cdfuncionario`, `nome`, `sobrenome`, `telefone`, `email`, `senha`, `cdcargo`) VALUES
(1, 'Ivo', 'Miranda', '91984188928', 'ivo@gmail.com', 'ecaa4d8c5a5c28349de16842b273a4b9', NULL),
(2, 'Felipe', 'Carlos', '91998123762', 'exper15gamer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item_pedido`
--

CREATE TABLE `tb_item_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `nome_produto` varchar(120) NOT NULL,
  `preco` decimal(4,2) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `subtotal` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_item_pedido`
--

INSERT INTO `tb_item_pedido` (`id`, `pedido_id`, `produto_id`, `nome_produto`, `preco`, `quantidade`, `subtotal`) VALUES
(7, 11, 20, 'Pizza camarão com queijo cuia', 59.90, 1, 59.90),
(8, 12, 25, 'Hamburguer de Camarão com Jambu', 39.90, 1, 39.90),
(9, 12, 24, 'Calzone de Filé', 29.90, 1, 29.90),
(10, 13, 23, 'Calzone de Charque', 29.90, 1, 29.90),
(11, 14, 26, 'Pizza de Calabresa', 49.90, 1, 49.90),
(12, 14, 25, 'Hamburguer de Camarão com Jambu', 39.90, 1, 39.90),
(13, 15, 25, 'Hamburguer de Camarão com Jambu', 39.90, 1, 39.90),
(14, 16, 23, 'Calzone de Charque', 29.90, 1, 29.90),
(15, 16, 20, 'Pizza camarão com queijo cuia', 59.90, 1, 59.90),
(16, 17, 21, 'Pizza de Filé com fritas', 59.90, 1, 59.90),
(17, 17, 26, 'Pizza de Calabresa', 49.90, 1, 49.90),
(18, 17, 20, 'Pizza camarão com queijo cuia', 59.90, 1, 59.90),
(19, 18, 21, 'Pizza de Filé com fritas', 59.90, 1, 59.90),
(20, 19, 19, 'Calzone de Camarão rosa', 29.90, 1, 29.90),
(21, 21, 17, 'Pizza Portuguesa', 59.90, 1, 59.90),
(22, 22, 20, 'Pizza camarão com queijo cuia', 59.90, 1, 59.90),
(23, 22, 23, 'Calzone de Charque', 29.90, 1, 29.90),
(24, 23, 21, 'Pizza de Filé com fritas', 59.90, 1, 59.90),
(25, 23, 22, 'Pizza de Morango', 59.90, 1, 59.90),
(26, 24, 19, 'Calzone de Camarão rosa', 29.90, 1, 29.90),
(27, 24, 22, 'Pizza de Morango', 59.90, 1, 59.90),
(28, 25, 17, 'Pizza Portuguesa', 59.90, 2, 99.99),
(29, 25, 19, 'Calzone de Camarão rosa', 29.90, 1, 29.90),
(30, 26, 17, 'Pizza Portuguesa', 59.90, 1, 59.90);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id` int(11) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `telefone` varchar(120) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pizzaria`
--

CREATE TABLE `tb_pizzaria` (
  `cdpizzaria` int(11) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `cdproduto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ingrediente` varchar(120) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `valor` decimal(4,2) NOT NULL,
  `categoriaid` int(11) DEFAULT NULL,
  `disponibilidade` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`cdproduto`, `nome`, `ingrediente`, `imagem`, `valor`, `categoriaid`, `disponibilidade`) VALUES
(17, 'Pizza Portuguesa', 'Massa caseira, pimentão, cebola, ovo cozido, queijo mussarela, presunto, azeitona, milho, ervilha.', 'uploads/pizza portuguesa.jpeg', 59.90, 1, 1),
(19, 'Calzone de Camarão rosa', 'Massa leve da casa, queijo, tomate, requeijão, oregano e camarao rosa.', 'uploads/calzone de camarao.jpeg', 29.90, 2, 1),
(20, 'Pizza camarão com queijo cuia', 'Massa caseira, queijo cuia, oregano, molho de tomate', 'uploads/pizza de queijo cuia.jpeg', 59.90, 1, 1),
(21, 'Pizza de Filé com fritas', 'Massa caseira, filé mignon, queijo mussarela, oregano e batata frita.', 'uploads/pizza file com fritas.jpeg', 59.90, 1, 1),
(22, 'Pizza de Morango', 'Massa caseira, creme doce branco e morango.', 'uploads/pizza de morango.jpeg', 59.90, 1, 1),
(24, 'Calzone de Filé', 'Massa leve da casa, queijo, tomate, requeijão, oregano e filé em cubos.', 'uploads/calzone de charque.jpeg', 29.90, 2, 1),
(25, 'Hamburguer de Camarão com Jambu', 'Pão brioche, alface, queijo mussarela, cebola caramelizada, tomate, pepino, jambu e camarão rosa', 'uploads/hamburger de camarão com jambu.jpeg', 39.90, 3, 1),
(26, 'Pizza de Calabresa', 'Massa caseira, queijo mussarela, oregano, cebola, tomate e calabresa.', 'uploads/pizza de calabresa.jpeg', 49.90, 1, 1),
(27, 'Pizza de Óreo com MM', 'Massa caseira, creme doce de chocolate, biscoito óreo e MM', 'uploads/pizza de oreo.jpeg', 59.90, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`cdcategoria`);

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cdcliente`);

--
-- Índices para tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`cdendereco`);

--
-- Índices para tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`cdfuncionario`);

--
-- Índices para tabela `tb_item_pedido`
--
ALTER TABLE `tb_item_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`usuario`);

--
-- Índices para tabela `tb_pizzaria`
--
ALTER TABLE `tb_pizzaria`
  ADD PRIMARY KEY (`cdpizzaria`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`cdproduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `cdcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `cdcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `cdendereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `cdfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_item_pedido`
--
ALTER TABLE `tb_item_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_pizzaria`
--
ALTER TABLE `tb_pizzaria`
  MODIFY `cdpizzaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `cdproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`usuario`) REFERENCES `tb_cliente` (`cdcliente`);
COMMIT;

-- create table tb_pedido
-- (
-- 	idpedido int auto_increment primary key,
--     cdproduto int not null,
--     quantidade int not null,
--     cdcliente int not null
-- );

-- alter table tb_funcionario add foreign key(cdcargo) references tb_cargo(cdcargo);
-- alter table tb_pedido add foreign key(cdproduto) references tb_produto(cdproduto);
-- alter table tb_pedido add foreign key(cdcliente) references tb_cliente(cdcliente);

