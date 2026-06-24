-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para loja_ocultismo
CREATE DATABASE IF NOT EXISTS `loja_ocultismo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `loja_ocultismo`;

-- Copiando estrutura para tabela loja_ocultismo.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cores` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_semana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `historia` text COLLATE utf8mb4_unicode_ci,
  `simbolos` text COLLATE utf8mb4_unicode_ci,
  `saudacoes` text COLLATE utf8mb4_unicode_ci,
  `personalidade` text COLLATE utf8mb4_unicode_ci,
  `animais` text COLLATE utf8mb4_unicode_ci,
  `elementos` text COLLATE utf8mb4_unicode_ci,
  `datas_rituais` text COLLATE utf8mb4_unicode_ci,
  `notas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nome_unique` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.categorias: ~20 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nome`, `descricao`, `imagem`, `linha`, `cores`, `dia_semana`, `historia`, `simbolos`, `saudacoes`, `personalidade`, `animais`, `elementos`, `datas_rituais`, `notas`, `created_at`, `updated_at`) VALUES
	(1, 'Oxalá', 'Orixá da criação, pureza e paz', 'https://i.pinimg.com/1200x/9e/71/72/9e71720c0e49d57ebd70c7748ffe1a75.jpg', 'orixa', 'Branco', 'Sexta-Feira', 'Oxalá é considerado o pai de todos os orixás, símbolo da paz e da criação. É associado à luz, à sabedoria e à justiça, trazendo harmonia aos corações humanos e proteção espiritual.', 'Cajado, veste branca', 'Epa Baba!', 'Calmo e justo', 'Pombinha Branca', 'Ar', '21/12 - 25/12', 'O sincretismo associa Oxalá a Jesus Cristo, sendo a data de 25 de dezembro a principal conexão entre as duas figuras.', '2025-09-22 16:25:11', '2025-09-22 20:59:00'),
	(2, 'Iemanjá', 'Orixá das águas, proteção e maternidade', 'https://i.pinimg.com/736x/ce/73/94/ce7394ba19e7a4cf1572ffc82ab865b9.jpg', 'orixa', 'Azul e branco', 'Sábado', 'Iemanjá é a rainha do mar, mãe de todos os orixás e protetora dos pescadores. Suas águas simbolizam fertilidade, amor e proteção para a família, sendo cultuada em rituais de agradecimento e purificação.', 'Conchas, colares', 'Odoya! Odocya!', 'Mãe protetora', 'Peixes, Golfinhos', 'Água', '02/02 - 08/12', 'O sincretismo de Iemanjá no Brasil envolve sua associação com santas católicas, como Nossa Senhora dos Navegantes, Nossa Senhora das Candeias e a Virgem Maria', '2025-09-22 16:25:11', '2025-09-22 21:24:00'),
	(3, 'Ogum', 'Orixá da guerra e proteção', 'https://i.pinimg.com/736x/d2/08/01/d20801edcb09f8423341fb25d57c092c.jpg', 'orixa', 'Azul escuro e vermelho', 'Terça-feira', 'Ogum é o guerreiro que abre caminhos, senhor das estradas e da tecnologia. Protege os trabalhadores, combatentes e todos que buscam coragem para vencer obstáculos, sendo também patrono da força e do ferro.', 'Espada, ferro', 'Ogunhê!', 'Corajoso e direto', 'Cão', 'Fogo', '23/04', 'O sincretismo do orixá Ogum no Brasil o associa principalmente a São Jorge, um santo guerreiro católico, devido às semelhanças com o orixá africano da guerra, das ferramentas e da tecnologia.', '2025-09-22 16:25:11', '2025-09-22 21:01:48'),
	(4, 'Xangô', 'Orixá da justiça e força', 'https://i.pinimg.com/1200x/f5/6f/26/f56f260c89be042963aee00ce3a2adf2.jpg', 'orixa', 'Vermelho e branco', 'Quarta-feira', 'Xangô é o orixá da justiça e do fogo, senhor dos trovões e da força. É conhecido por seu poder de equilibrar o bem e o mal, e seus filhos são ensinados a agir com coragem, lealdade e sabedoria.', 'Machado duplo, pedras', 'Kaô Kabecile!', 'Justo e temperamental', 'Leão', 'Fogo', '30/09', 'O sincretismo de Xangô, orixá iorubá do trovão e da justiça, com santos católicos no Brasil, foi uma forma de resistência cultural durante a escravidão. Xangô é sincretizado principalmente com São Jerônimo.', '2025-09-22 16:25:11', '2025-09-22 21:08:34'),
	(5, 'Oxóssi', 'Orixá da caça e fartura', 'https://i.pinimg.com/1200x/f9/4c/00/f94c002b8e710425237972907d9d9d89.jpg', 'orixa', 'Verde', 'Quinta-feira', 'Oxóssi é o orixá da caça, da fartura e da sabedoria da floresta. Guardião das matas e dos animais, representa a astúcia, a paciência e o conhecimento das plantas e recursos naturais. É invocado para trazer sustento, proteção e equilíbrio com a natureza', 'Arco e flecha', 'Oke Aro!', 'Sagaz e paciente', 'Veado', 'Terra', '20/01', 'O sincretismo de Oxóssi é São Sebastião: Comum no Rio de Janeiro e em outras partes do país, a associação de Oxóssi com São Sebastião se deve a elementos como a flecha (o arco e a flecha de Oxóssi e as flechas que atingiram São Sebastião) e o caráter de proteção dos dois.', '2025-09-22 16:25:11', '2025-09-22 21:05:27'),
	(6, 'Caboclo', 'Espírito de proteção e sabedoria', 'https://i.pinimg.com/736x/c9/36/eb/c936eb95dd21daa45c49f3390f50ba1f.jpg', 'linha', 'Verde e marrom', 'Domingo', 'Guias da natureza e cura', 'Facão, penas', 'Oke Arô!', 'Sábio e protetor', 'Onça', 'Terra', '15/08', NULL, '2025-09-22 16:25:11', '2025-09-24 00:51:35'),
	(7, 'Preto-Velho', 'Espírito ancestral, conselheiro', 'https://i.pinimg.com/736x/25/0d/4a/250d4acfc0404033a8b4d4be13ee4c90.jpg', 'linha', 'Cinza', 'Sexta-feira', 'Ancião que guia e aconselha', 'Cajado, charutos', 'Adorei as Almas!', 'Calmo e experiente', 'Coruja', 'Ar', '01/11', NULL, '2025-09-22 16:25:11', '2025-09-24 00:49:45'),
	(8, 'Exu', 'Guardião dos caminhos e encruzilhadas', 'https://i.pinimg.com/736x/f4/ed/eb/f4edebbcf096ac24501fdda0b48cf3d8.jpg', 'linha', 'Vermelho e preto', 'Terça-feira', 'Mensageiro e guardião de caminhos', 'Tridente, chaves', 'Laroiê!', 'Astuto e rápido', 'Cachorro', 'Fogo', '25/12', NULL, '2025-09-22 16:25:11', '2025-09-24 00:53:47'),
	(9, 'Pomba Gira', 'Espírito feminino de força e sedução', 'https://i.pinimg.com/736x/b6/64/d0/b664d0a333e87a9a7ad8028c29aa9042.jpg', 'linha', 'Vermelho e rosa', 'Sábado', 'Encanta e protege nos trabalhos amorosos', 'Espelhos, leques', 'Epa!', 'Sensual e intensa', 'Cavalo', 'Fogo', '31/12', NULL, '2025-09-22 16:25:11', '2025-09-24 00:54:10'),
	(10, 'Ervas', 'Categoria destinada às ervas utilizadas em rituais e práticas espirituais.', 'https://i.pinimg.com/1200x/a2/28/f5/a228f571ac9c3d36955fcdf24d234a1f.jpg', 'Itens', 'verde, marrom', 'segunda-feira', 'Ervas usadas tradicionalmente para proteção, limpeza e energização.', 'folhas, raízes', 'Saudações às ervas', 'Calma, purificação', 'Coruja, cervo', 'Terra, água', '1º de cada mês', 'Algumas notas sobre uso e procedência das ervas', '2025-09-22 17:47:21', '2025-09-24 01:27:41'),
	(11, 'Pedras', 'Categoria destinada às pedras utilizadas em rituais e práticas espirituais.', 'https://i.pinimg.com/736x/39/8c/86/398c869811287b3e132e22dbf4f70d30.jpg', 'Itens', 'diversas', 'segunda-feira', 'Pedras usadas tradicionalmente para proteção, limpeza e energização.', 'Cristais, geodos', 'Saudações às pedras', 'Equilíbrio, energia positiva', 'Leão, coruja', 'Terra, fogo', '1º de cada mês', 'Algumas notas sobre uso e procedência das pedras', '2025-09-22 17:47:21', '2025-09-24 01:28:55'),
	(12, 'Iansã', 'Orixá dos ventos e tempestades, senhora da energia', 'https://i.pinimg.com/736x/10/e9/67/10e967205a8071cc194330e00340cf8c.jpg', 'orixa', 'Vermelho e marrom', 'Quarta-feira', 'Iansã, ou Oyá, é a senhora dos ventos e tempestades, orixá da transformação e da coragem. É associada à força, à paixão e à proteção contra injustiças, guiando aqueles que buscam mudança e liberdade.', 'Espada, chifres de boi', 'Odé! Eparrey!', 'Corajosa e independente', 'Cavalo', 'Ar', '04/12', 'Iansã, ou Oyá, é a senhora dos ventos e tempestades, orixá da transformação e da coragem. É associada à força, à paixão e à proteção contra injustiças, guiando aqueles que buscam mudança e liberdade.', '2025-09-22 17:49:55', '2025-09-22 21:07:53'),
	(23, 'Obaluaê/Omulu', 'Orixá da saúde, cura e transformação', 'https://i.pinimg.com/736x/29/db/c9/29dbc94fb3bf76ce0511538b637552ff.jpg', 'orixa', 'Branco e marrom', 'Segunda-feira', 'Protetor da saúde e doenças', 'Capa de palha, cajado', 'Atoto!', 'Paciente e curador', 'Rato', 'Terra', '13/08', 'O sincretismo de Obaluaê, um orixá ligado às doenças, curas e morte, é com São Lazaro e São Roque.', '2025-09-22 17:49:55', '2025-09-22 21:11:41'),
	(24, 'Nanã', 'Orixá das águas paradas, ancestralidade', 'https://i.pinimg.com/1200x/e7/75/86/e77586517f7523fb1c7cf9c3c285a0fc.jpg', 'orixa', 'Lilás e roxo', 'Terça-feira', 'Naná é a orixá das águas paradas, dos rios e dos lagos, associada à sabedoria, à fertilidade e à maternidade. Representa a ancestralidade e a força das mulheres, trazendo equilíbrio, paciência e proteção às famílias. É invocada para purificação, aconselhamento e cuidado espiritual', 'Cajado, cabaça', 'Saluba Nanã!', 'Sábia e reflexiva', 'Jacaré', 'Água', '26/07', 'O sincretismo de Nanã se dá com Nossa Senhora Sant\'Ana no catolicismo, sendo a avó de Jesus e celebrada no dia 26 de julho em religiões afro-brasileiras como a Umbanda e o Candomblé.', '2025-09-22 17:49:55', '2025-09-22 21:12:51'),
	(25, 'Oxumaré', 'Orixá da riqueza e movimento', 'https://i.pinimg.com/1200x/4a/47/a8/4a47a82d0d2372aa4c40db4901d09fad.jpg', 'orixa', 'Verde e amarelo', 'Terça-feira', 'Oxumaré é o orixá da serpente e do arco-íris, simbolizando a renovação, a riqueza e a transformação. Ligado à continuidade da vida e ao movimento constante, é chamado para trazer equilíbrio entre o céu e a terra, a prosperidade material e espiritual, e a fluidez das energias. Representa a dualidade e a união dos opostos, sendo um poderoso intermediário na mudança e na evolução pessoal', 'Serpente, arco-íris', 'Arroboboi!', 'Flexível e renovador', 'Serpente', 'Ar/Terra', '24/08', 'O sincretismo de Oxumaré, orixá africano das serpentes, do arco-íris e da renovação, ocorre com o santo católico São Bartolomeu.', '2025-09-22 17:49:55', '2025-09-22 21:14:47'),
	(27, 'Erê', 'Espírito infantil de alegria e brincadeira', 'https://i.pinimg.com/1200x/07/61/74/076174a542dc05c0b69aa5d9a76d8494.jpg', 'linha', 'Colorido', 'Sábado', 'Espírito infantil que traz leveza, alegria e proteção', 'Brinquedos, doces', 'Salve as Crianças!', 'Brincalhão e travesso', 'Criança', 'Ar', '01/01', NULL, '2025-09-22 17:51:40', '2025-09-24 00:56:33'),
	(28, 'Baiano', 'Espírito de força, proteção e sabedoria', 'https://i.pinimg.com/736x/ce/74/02/ce7402662a44e0ff922e6a912084668f.jpg', 'linha', 'Azul e branco', 'Domingo', 'Guias que trazem proteção e força nos trabalhos espirituais', 'Facão, tambor', 'Epa!', 'Corajoso e alegre', 'Cavalo', 'Terra', '02/07', NULL, '2025-09-22 17:51:40', '2025-09-24 01:06:33'),
	(29, 'Marinheiro', 'Espírito ligado ao mar e viagens', 'https://i.pinimg.com/1200x/51/d2/e8/51d2e8b2bc9aaf4fda6f1f2b97f498d8.jpg', 'linha', 'Azul', 'Sábado', 'Guia protetor das viagens e do mar', 'Âncora, corda', 'Laroiê!', 'Aventureiro e protetor', 'Golfinho', 'Água', '20/08', NULL, '2025-09-22 17:51:40', '2025-09-24 01:18:21'),
	(30, 'Cigano', 'Espírito da liberdade e alegria', 'https://i.pinimg.com/736x/56/4e/52/564e52fa5578d308e9dfdb170798e679.jpg', 'linha', 'Vermelho e dourado', 'Sexta-feira', 'Guias que trazem alegria, sorte e dança', 'Cartas, lenços coloridos', 'Optcha!', 'Sociável e alegre', 'Cavalo', 'Fogo', '05/09', NULL, '2025-09-22 17:51:40', '2025-09-24 01:27:13'),
	(31, 'Oxum', 'Orixá do amor, da fertilidade e das águas doces', 'https://i.pinimg.com/736x/b9/d6/73/b9d673dca9f8f3c257b6dbaa70030bf6.jpg', 'orixa', 'Amarelo e dourado', 'Sábado', '"Oxum é a deusa das águas doces, do amor e da fertilidade. Representa a beleza, a riqueza e a harmonia nos relacionamentos, sendo invocada para trazer prosperidade e carinho às famílias."', 'Espelhos, leques, pulseiras douradas', 'Oraieieo!', 'Carinhosa e vaidosa', 'Peixes, Cisnes', 'Água', '08/12', 'O sincretismo de Oxum refere-se à associação da Orixá africana Oxum com diferentes santas católicas, principalmente Nossa Senhora da Conceição, Aparecida e do Carmo.', '2025-09-22 17:57:03', '2025-09-22 21:17:01');

-- Copiando estrutura para tabela loja_ocultismo.encomendas
CREATE TABLE IF NOT EXISTS `encomendas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `nome_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cliente Desconhecido',
  `email_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(8,2) NOT NULL DEFAULT '0.00',
  `observacoes` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encomendas_user_id_foreign` (`user_id`),
  CONSTRAINT `encomendas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.encomendas: ~1 rows (aproximadamente)
INSERT INTO `encomendas` (`id`, `user_id`, `nome_cliente`, `email_cliente`, `telefone_cliente`, `endereco`, `total`, `observacoes`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Mojang Studios', 'Microsoft@gmail.com', '4344546', 'endereço ficticio', 139.80, NULL, 'pendente', '2025-11-05 06:12:06', '2025-11-05 06:12:06');

-- Copiando estrutura para tabela loja_ocultismo.encomenda_itens
CREATE TABLE IF NOT EXISTS `encomenda_itens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `encomenda_id` bigint unsigned NOT NULL,
  `produto_id` bigint unsigned NOT NULL,
  `quantidade` int NOT NULL DEFAULT '1',
  `preco_unitario` decimal(8,2) NOT NULL DEFAULT '0.00',
  `subtotal` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encomenda_itens_encomenda_id_foreign` (`encomenda_id`),
  KEY `encomenda_itens_produto_id_foreign` (`produto_id`),
  CONSTRAINT `encomenda_itens_encomenda_id_foreign` FOREIGN KEY (`encomenda_id`) REFERENCES `encomendas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `encomenda_itens_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.encomenda_itens: ~3 rows (aproximadamente)
INSERT INTO `encomenda_itens` (`id`, `encomenda_id`, `produto_id`, `quantidade`, `preco_unitario`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 15.00, 15.00, '2025-11-05 06:12:06', '2025-11-05 06:12:06'),
	(2, 1, 13, 1, 4.80, 4.80, '2025-11-05 06:12:06', '2025-11-05 06:12:06'),
	(3, 1, 2, 1, 120.00, 120.00, '2025-11-05 06:12:06', '2025-11-05 06:12:06');

-- Copiando estrutura para tabela loja_ocultismo.estoques
CREATE TABLE IF NOT EXISTS `estoques` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `produto_id` bigint unsigned NOT NULL,
  `quantidade` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estoques_user_id_foreign` (`user_id`),
  KEY `estoques_produto_id_foreign` (`produto_id`),
  CONSTRAINT `estoques_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `estoques_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.estoques: ~2 rows (aproximadamente)
INSERT INTO `estoques` (`id`, `user_id`, `produto_id`, `quantidade`, `created_at`, `updated_at`) VALUES
	(4, 1, 16, 5, '2025-11-05 05:16:30', '2025-11-05 05:16:30'),
	(6, 1, 1, 1, '2025-11-05 05:16:51', '2025-11-05 05:16:51');

-- Copiando estrutura para tabela loja_ocultismo.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.fornecedores: ~1 rows (aproximadamente)
INSERT INTO `fornecedores` (`id`, `nome`, `email`, `telefone`, `endereco`, `created_at`, `updated_at`) VALUES
	(1, 'Microsoft', NULL, NULL, NULL, '2025-11-05 05:10:37', '2025-11-05 05:10:37');

-- Copiando estrutura para tabela loja_ocultismo.fornecedor_produto
CREATE TABLE IF NOT EXISTS `fornecedor_produto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fornecedor_id` bigint unsigned NOT NULL,
  `produto_id` bigint unsigned NOT NULL,
  `quantidade` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor_produto_fornecedor_id_foreign` (`fornecedor_id`),
  KEY `fornecedor_produto_produto_id_foreign` (`produto_id`),
  CONSTRAINT `fornecedor_produto_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fornecedor_produto_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.fornecedor_produto: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela loja_ocultismo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.migrations: ~11 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2025_09_10_100000_create_fornecedores_table', 1),
	(2, '2025_09_11_211418_create_categorias_table', 1),
	(3, '2025_09_11_211423_create_produtos_table', 1),
	(4, '2025_09_12_172207_create_sessions_table', 1),
	(5, '2025_09_12_172207_create_usuarios_table', 1),
	(6, '2025_09_19_005149_create_encomendas_table', 1),
	(7, '2025_09_30_133719_create_encomenda_items_table', 1),
	(8, '2025_11_04_142139_create_pontos_table', 1),
	(9, '2025_11_04_174341_add_imagem_to_usuarios_table', 1),
	(10, '2025_11_04_205921_create_fornecedor_produto_table', 1),
	(11, '2025_11_04_213105_create_estoques_table', 1);

-- Copiando estrutura para tabela loja_ocultismo.pontos
CREATE TABLE IF NOT EXISTS `pontos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('cantado','riscado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `entidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funcao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letra` text COLLATE utf8mb4_unicode_ci,
  `simbolo` text COLLATE utf8mb4_unicode_ci,
  `categoria_id` bigint unsigned NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pontos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `pontos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.pontos: ~8 rows (aproximadamente)
INSERT INTO `pontos` (`id`, `nome`, `tipo`, `entidade`, `funcao`, `letra`, `simbolo`, `categoria_id`, `descricao`, `audio`, `created_at`, `updated_at`) VALUES
	(1, 'Ponto de Oxalá', 'cantado', 'Oxalá', 'abertura', 'Oxalá é a luz que ilumina\nNos caminhos da paz e da vida', NULL, 1, 'Ponto de abertura de Oxalá', NULL, '2025-11-05 01:35:44', '2025-11-05 01:35:44'),
	(2, 'Ponto de Iemanjá', 'cantado', 'Iemanjá', 'abertura', 'Salve Iemanjá!\nRainha das águas!', NULL, 2, 'Ponto de saudação à Iemanjá', NULL, '2025-11-05 01:35:44', '2025-11-05 01:35:44'),
	(3, 'Ponto de Ogum', 'cantado', 'Ogum', 'abertura', 'Ogum é guerreiro\nabre os caminhos', NULL, 3, 'Ponto de Ogum para proteção e força', NULL, '2025-11-05 01:35:44', '2025-11-05 01:35:44'),
	(4, 'Ponto de Xangô', 'cantado', 'Xangô', 'abertura', 'Xangô, justiceiro\ntraz o equilíbrio', NULL, 4, 'Ponto de Xangô para justiça e coragem', NULL, '2025-11-05 01:35:44', '2025-11-05 01:35:44'),
	(5, 'Ponto de Oxóssi', 'cantado', 'Oxóssi', 'abertura', 'Oxóssi caçador\nabre os caminhos da fartura', NULL, 5, 'Ponto de Oxóssi para prosperidade', NULL, '2025-11-05 01:35:44', '2025-11-05 01:35:44'),
	(6, 'Ponto de Caboclo', 'cantado', 'Caboclo', 'abertura', 'Caboclo sábio\nguias da mata e da cura', NULL, 6, 'Ponto de Caboclo para proteção e sabedoria', NULL, '2025-11-05 01:35:44', '2025-11-05 01:35:44'),
	(7, 'Ponto de Exu', 'cantado', 'Exu', 'abertura', 'Exu senhor dos caminhos\nabre as encruzilhadas', NULL, 8, 'Ponto de Exu para abertura de caminhos', NULL, '2025-11-05 01:35:44', '2025-11-05 01:35:44'),
	(8, '"É Obaluaê"', 'cantado', 'Obaluaê', 'Adoração', 'É OBALUAÊ\r\nÉ OBALUAÊ\r\n,\r\nÉ ATOTÔ\r\nÉ\r\nOBALUAÊ\r\nÉ OBALUAÊ\r\nSE VOCÊ ESTÁ SOFRENDO NO LEITO OU COM FRIO E COM DOR\r\nCOM PIPOCA\r\nE COM DENDÊ\r\nMUITA GENTE ELE CUROU\r\nSE SEU CORPO ESTÁ FERIDO E NÃO PODE MAIS SUPORTAR\r\nPEÇA PROTEÇÃO\r\nA ELE\r\nQUE ELE VAI LHE AJUDAR! OBALUAÊ!!! É OBALUAÊ É OBALUAÊ, É ATOTÔ É OBALUAÊ É OBALUAÊ\r\nTENHO SEGREDO DA VIDA DO COMEÇO\r\nE DO FIM\r\nO MEU SENHOR DAS PALHAS\r\nTENHA MUITA DÓ DE MIM\r\nNA PROCISSÃO DAS ALMAS\r\nQUE PARTEM PRO INFINITO\r\nELE VAI MOSTRANDO\r\nA ELAS\r\nOUTRO MUNFO MAIS BONITO\r\n, OBALUAÊ\r\nÉ OBALUAÊ\r\nÉ OBALUAÊ\r\n,\r\nÉ ATOTÔ\r\nÉ\r\nOBALUAÊ\r\nÉ OBALUAÊ', 'Palha', 23, NULL, 'pontos/oAt4VQOGmmih8HdTCPHGZYbnxPLBwZ6YYGclq3TC.mp3', '2025-11-05 05:43:18', '2025-11-05 05:45:15');

-- Copiando estrutura para tabela loja_ocultismo.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estoque` int NOT NULL DEFAULT '0',
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` decimal(8,2) DEFAULT NULL,
  `dimensoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `observacoes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.produtos: ~19 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `categoria_id`, `imagem`, `estoque`, `codigo`, `peso`, `dimensoes`, `tags`, `popular`, `ativo`, `observacoes`, `created_at`, `updated_at`) VALUES
	(1, 'Velas de Oxalá', 'Velas brancas para oferenda', 15.00, 1, 'https://http2.mlstatic.com/D_NQ_NP_804876-MLB78358727185_082024-O-vela-palito-n-2-maco-c-8-unidades-branca-12g-c-nfe.webp', 30, 'VXO001', 0.20, '10x3 cm', 'vela,oxala,oferta', 1, 1, NULL, '2025-09-22 16:25:11', '2025-11-05 05:23:51'),
	(2, 'Estátua de Ogum', 'Estátua para altar de Ogum', 120.00, 3, 'https://i.pinimg.com/736x/e1/87/99/e18799dcb410a70b268cd60097a68cd2.jpg', 9, 'ESTO001', 1.50, '20x10x10 cm', 'estatua,ogum', 1, 1, NULL, '2025-09-22 16:25:11', '2025-11-05 05:25:42'),
	(3, 'Imagem de Iemanjá', 'Imagem da orixá Iemanjá', 80.00, 2, 'https://i.pinimg.com/736x/23/36/01/23360118eaf87734c544ccec61a62a33.jpg', 10, 'IMG001', 0.80, '15x10x5 cm', 'imagem,iemanja', 1, 1, NULL, '2025-09-22 16:25:11', '2025-09-24 01:37:24'),
	(4, 'Patuá de Oxóssi', 'Amuleto protetor', 25.00, 5, 'produtos/uvDsH2JdHjPy0vzX6EAbeggG3l0zTq859AALqUW6.jpg', 30, 'PAT001', 0.10, '5x5 cm', 'amulet,oxossi', 1, 1, NULL, '2025-09-22 16:25:11', '2025-11-05 06:10:55'),
	(5, 'Guias de Caboclo', 'Colares para trabalhos espirituais', 30.00, 6, 'https://via.placeholder.com/300x200?text=Caboclo', 15, 'GUIA001', 0.30, '15 cm', 'guia,caboclo', 1, 1, '', '2025-09-22 16:25:11', '2025-09-22 16:25:11'),
	(6, 'Velas de Preto-Velho', 'Velas para oferendas e proteção', 12.00, 7, 'https://via.placeholder.com/300x200?text=Preto-Velho', 25, 'VPH001', 0.20, '10x3 cm', 'vela,preto-velho', 1, 1, '', '2025-09-22 16:25:11', '2025-09-22 16:25:11'),
	(7, 'Estátua de Exu', 'Estátua protetora', 100.00, 8, 'https://via.placeholder.com/300x200?text=Exu', 7, 'ESTEX001', 1.20, '18x10x10 cm', 'estatua,exu', 1, 1, '', '2025-09-22 16:25:11', '2025-09-22 16:25:11'),
	(8, 'Guias de Pomba Gira', 'Colares para trabalhos espirituais', 35.00, 9, 'https://via.placeholder.com/300x200?text=Pomba+Gira', 12, 'GUIAPG001', 0.40, '15 cm', 'guia,pomba-gira', 1, 1, '', '2025-09-22 16:25:11', '2025-09-22 16:25:11'),
	(9, 'Arruda', 'Erva de proteção e limpeza espiritual.', 5.50, 10, 'https://exemplo.com/arruda.jpg', 50, 'ERV001', 0.05, '10x5x2 cm', 'protecao,limpeza', 1, 1, 'Uso em banhos e amuletos', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(10, 'Manjericão', 'Erva para prosperidade e equilíbrio.', 6.00, 10, 'https://exemplo.com/manjericao.jpg', 40, 'ERV002', 0.05, '10x5x2 cm', 'prosperidade,harmonia', 1, 1, 'Pode ser usada em rituais ou incensos', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(11, 'Hortelã', 'Erva para limpeza e energização.', 4.50, 10, 'https://exemplo.com/hortela.jpg', 60, 'ERV003', 0.05, '10x5x2 cm', 'purificacao,energia', 1, 1, 'Uso em banhos, chás e rituais', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(12, 'Alecrim', 'Erva de proteção e purificação.', 5.00, 10, 'https://exemplo.com/alecrim.jpg', 45, 'ERV004', 0.05, '10x5x2 cm', 'protecao,energia', 1, 1, 'Pode ser usada em banhos e defumações', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(13, 'Camomila', 'Erva calmante e harmonizadora.', 4.80, 10, 'https://exemplo.com/camomila.jpg', 50, 'ERV005', 0.05, '10x5x2 cm', 'calma,energia', 1, 1, 'Uso em chás e rituais', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(14, 'Ametista', 'Cristal violeta de equilíbrio e proteção.', 15.00, 11, 'https://exemplo.com/ametista.jpg', 25, 'PED001', 0.10, '4x4x4 cm', 'equilibrio,protecao', 1, 1, 'Pode ser usada em anéis, colares ou altar', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(15, 'Quartzo Rosa', 'Pedra do amor e harmonia.', 18.00, 11, 'https://exemplo.com/quartzo_rosa.jpg', 20, 'PED002', 0.10, '4x4x4 cm', 'amor,harmonia', 1, 1, 'Uso em rituais de amor e proteção', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(16, 'Citrino', 'Pedra da prosperidade e energia positiva.', 20.00, 11, 'https://exemplo.com/citrino.jpg', 15, 'PED003', 0.12, '5x5x5 cm', 'prosperidade,energia', 1, 1, 'Pode ser usado em altar ou colar', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(17, 'Jade', 'Pedra da harmonia e equilíbrio.', 22.00, 11, 'https://exemplo.com/jade.jpg', 18, 'PED004', 0.12, '5x5x5 cm', 'harmonia,equilibrio', 1, 1, 'Ideal para meditação ou colares', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(18, 'Turmalina Negra', 'Pedra de proteção energética.', 25.00, 11, 'https://exemplo.com/turmalina_negra.jpg', 12, 'PED005', 0.15, '6x6x6 cm', 'protecao,energia', 1, 1, 'Colocar em ambientes ou altar', '2025-09-22 17:50:10', '2025-09-22 17:50:10'),
	(22, 'Ravemuon', 'asxsc', 279.90, 28, 'produtos/VnKALGVr53xPHLog4YcCY3o6plmf2dN77s7nVCIH.jpg', 0, NULL, NULL, NULL, NULL, 0, 1, NULL, '2025-11-05 06:10:10', '2025-11-05 06:10:10');

-- Copiando estrutura para tabela loja_ocultismo.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('E8bsYuWbeRUGSGYHC0qvy5kkKlKtcYMdDgUiYGtc', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidU5OSjZwQUV3aXdLRThhQUUxMGF4ckE2VXRlUG1wdUJzZGprQlBEQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1762312331);

-- Copiando estrutura para tabela loja_ocultismo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fornecedor_id` bigint unsigned DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  KEY `usuarios_fornecedor_id_foreign` (`fornecedor_id`),
  CONSTRAINT `usuarios_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `fornecedor_id`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Ravemuon', 'ravemuon@gmail.com', '$2y$12$iLwQq3gzrDKBuxBlECB6N.LXDuv0B8XX2QArZzVe.lr4HLp2gro7m', NULL, NULL, '2025-11-05 05:10:09', '2025-11-05 05:10:09'),
	(2, 'Mojang Studios', 'Microsoft@gmail.com', '$2y$12$Wz.aIwEu7U0YDl5rYES1E.vrI8Sb1rpJUJlkZNrwYKmOXF8hugDsO', 1, 'usuarios/hGcmKFxbRTgF2kVzXwyzvKWPOkl73MeqNkFSAsId.jpg', '2025-11-05 05:10:37', '2025-11-05 05:57:14');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
