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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.categorias: ~20 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nome`, `descricao`, `imagem`, `linha`, `cores`, `dia_semana`, `historia`, `simbolos`, `saudacoes`, `personalidade`, `animais`, `elementos`, `datas_rituais`, `notas`, `created_at`, `updated_at`) VALUES
	(1, 'Oxalá', 'O criador e pacificador do mundo', 'https://i.pinimg.com/1200x/33/d4/16/33d41663e4a90027b1a3cdab09146e10.jpg', 'orixa', 'Branco', 'Sexta-Feira', 'Oxalá é o orixá da criação, da paz e da sabedoria. Pai de todos os orixás, simboliza a pureza, a serenidade e a luz espiritual. Representa o equilíbrio, a paciência e a harmonia, sendo associado ao início e ao destino da vida.', 'Cajado, veste branca', 'Axé!', 'Calmo e justo', 'Cegonha', 'Ar', '21/12 - 25/12', 'Durante a escravidão, houve um sincretismo entre Oxalá e Jesus Cristo, como forma de preservar as tradições religiosas africanas diante da proibição e perseguição. Apesar das diferenças, as semelhanças entre Jesus e Oxalá, relacionadas à calma, paz e cuidado paternal, levaram à fusão de suas imagens."', '2025-09-23 20:36:00', '2025-09-30 22:02:53'),
	(2, 'Iemanjá', 'Orixá das águas, proteção e maternidade', 'https://i.pinimg.com/736x/ce/73/94/ce7394ba19e7a4cf1572ffc82ab865b9.jpg', 'orixa', 'Azul e branco', 'Sábado', 'Iemanjá é a rainha do mar, mãe de todos os orixás e protetora dos pescadores. Suas águas simbolizam fertilidade, amor e proteção para a família, sendo cultuada em rituais de agradecimento e purificação.', 'Conchas, colares', 'Odoya! Odocya!', 'Mãe protetora', 'Peixes, Golfinhos', 'Água', '02/02 - 08/12', 'O sincretismo de Iemanjá no Brasil envolve sua associação com santas católicas, como Nossa Senhora dos Navegantes, Nossa Senhora das Candeias e a Virgem Maria', '2025-09-22 13:25:11', '2025-09-22 18:24:00'),
	(3, 'Ogum', 'Orixá da guerra e proteção', 'https://i.pinimg.com/736x/d2/08/01/d20801edcb09f8423341fb25d57c092c.jpg', 'orixa', 'Azul escuro e vermelho', 'Terça-feira', 'Ogum é o guerreiro que abre caminhos, senhor das estradas e da tecnologia. Protege os trabalhadores, combatentes e todos que buscam coragem para vencer obstáculos, sendo também patrono da força e do ferro.', 'Espada, ferro', 'Ogunhê!', 'Corajoso e direto', 'Cão', 'Fogo', '23/04', 'O sincretismo do orixá Ogum no Brasil o associa principalmente a São Jorge, um santo guerreiro católico, devido às semelhanças com o orixá africano da guerra, das ferramentas e da tecnologia.', '2025-09-22 13:25:11', '2025-09-22 18:01:48'),
	(4, 'Xangô', 'Orixá da justiça e força', 'https://i.pinimg.com/1200x/f5/6f/26/f56f260c89be042963aee00ce3a2adf2.jpg', 'orixa', 'Vermelho e branco', 'Quarta-feira', 'Xangô é o orixá da justiça e do fogo, senhor dos trovões e da força. É conhecido por seu poder de equilibrar o bem e o mal, e seus filhos são ensinados a agir com coragem, lealdade e sabedoria.', 'Machado duplo, pedras', 'Kaô Kabecile!', 'Justo e temperamental', 'Leão', 'Fogo', '30/09', 'O sincretismo de Xangô, orixá iorubá do trovão e da justiça, com santos católicos no Brasil, foi uma forma de resistência cultural durante a escravidão. Xangô é sincretizado principalmente com São Jerônimo.', '2025-09-22 13:25:11', '2025-09-22 18:08:34'),
	(5, 'Oxóssi', 'Orixá da caça e fartura', 'https://i.pinimg.com/1200x/f9/4c/00/f94c002b8e710425237972907d9d9d89.jpg', 'orixa', 'Verde', 'Quinta-feira', 'Oxóssi é o orixá da caça, da fartura e da sabedoria da floresta. Guardião das matas e dos animais, representa a astúcia, a paciência e o conhecimento das plantas e recursos naturais. É invocado para trazer sustento, proteção e equilíbrio com a natureza', 'Arco e flecha', 'Oke Aro!', 'Sagaz e paciente', 'Veado', 'Terra', '20/01', 'O sincretismo de Oxóssi é São Sebastião: Comum no Rio de Janeiro e em outras partes do país, a associação de Oxóssi com São Sebastião se deve a elementos como a flecha (o arco e a flecha de Oxóssi e as flechas que atingiram São Sebastião) e o caráter de proteção dos dois.', '2025-09-22 13:25:11', '2025-09-22 18:05:27'),
	(6, 'Caboclo', 'Espírito de proteção e sabedoria', 'https://i.pinimg.com/736x/55/c7/a6/55c7a6aa6ac0ffe8ccfc385d71b78417.jpg', 'linha', 'Verde e marrom', 'Domingo', 'Guias da natureza e cura', 'Facão, penas', 'Oke Arô!', 'Sábio e protetor', 'Onça', 'Terra', '15/08', NULL, '2025-09-22 13:25:11', '2025-09-30 21:54:06'),
	(7, 'Preto-Velho', 'Espírito ancestral, conselheiro', 'https://i.pinimg.com/736x/25/0d/4a/250d4acfc0404033a8b4d4be13ee4c90.jpg', 'linha', 'Cinza', 'Sexta-feira', 'Ancião que guia e aconselha', 'Cajado, charutos', 'Adorei as Almas!', 'Calmo e experiente', 'Coruja', 'Ar', '01/11', NULL, '2025-09-22 13:25:11', '2025-09-23 21:49:45'),
	(8, 'Exu', 'Guardião dos caminhos e encruzilhadas', 'https://i.pinimg.com/736x/f4/ed/eb/f4edebbcf096ac24501fdda0b48cf3d8.jpg', 'linha', 'Vermelho e preto', 'Terça-feira', 'Mensageiro e guardião de caminhos', 'Tridente, chaves', 'Laroiê!', 'Astuto e rápido', 'Cachorro', 'Fogo', '25/12', NULL, '2025-09-22 13:25:11', '2025-09-23 21:53:47'),
	(9, 'Pomba Gira', 'Espírito feminino de força e sedução', 'https://i.pinimg.com/736x/b6/64/d0/b664d0a333e87a9a7ad8028c29aa9042.jpg', 'linha', 'Vermelho e rosa', 'Sábado', 'Encanta e protege nos trabalhos amorosos', 'Espelhos, leques', 'Epa!', 'Sensual e intensa', 'Cavalo', 'Fogo', '31/12', NULL, '2025-09-22 13:25:11', '2025-09-23 21:54:10'),
	(10, 'Ervas', 'Categoria destinada às ervas utilizadas em rituais e práticas espirituais.', 'https://i.pinimg.com/1200x/a2/28/f5/a228f571ac9c3d36955fcdf24d234a1f.jpg', 'Itens', 'verde, marrom', 'segunda-feira', 'Ervas usadas tradicionalmente para proteção, limpeza e energização.', 'folhas, raízes', 'Saudações às ervas', 'Calma, purificação', 'Coruja, cervo', 'Terra, água', '1º de cada mês', 'Algumas notas sobre uso e procedência das ervas', '2025-09-22 14:47:21', '2025-09-23 22:27:41'),
	(11, 'Pedras', 'Categoria destinada às pedras utilizadas em rituais e práticas espirituais.', 'https://i.pinimg.com/736x/39/8c/86/398c869811287b3e132e22dbf4f70d30.jpg', 'Itens', 'diversas', 'segunda-feira', 'Pedras usadas tradicionalmente para proteção, limpeza e energização.', 'Cristais, geodos', 'Saudações às pedras', 'Equilíbrio, energia positiva', 'Leão, coruja', 'Terra, fogo', '1º de cada mês', 'Algumas notas sobre uso e procedência das pedras', '2025-09-22 14:47:21', '2025-09-23 22:28:55'),
	(22, 'Iansã', 'Orixá dos ventos e tempestades, senhora da energia', 'https://i.pinimg.com/736x/10/e9/67/10e967205a8071cc194330e00340cf8c.jpg', 'orixa', 'Vermelho e marrom', 'Quarta-feira', 'Iansã, ou Oyá, é a senhora dos ventos e tempestades, orixá da transformação e da coragem. É associada à força, à paixão e à proteção contra injustiças, guiando aqueles que buscam mudança e liberdade.', 'Espada, chifres de boi', 'Odé! Eparrey!', 'Corajosa e independente', 'Cavalo', 'Ar', '04/12', 'Iansã, ou Oyá, é a senhora dos ventos e tempestades, orixá da transformação e da coragem. É associada à força, à paixão e à proteção contra injustiças, guiando aqueles que buscam mudança e liberdade.', '2025-09-22 14:49:55', '2025-09-22 18:07:53'),
	(23, 'Obaluaê/Omulu', 'Orixá da saúde, cura e transformação', 'https://i.pinimg.com/736x/29/db/c9/29dbc94fb3bf76ce0511538b637552ff.jpg', 'orixa', 'Branco e marrom', 'Segunda-feira', 'Omulu/Obaluaê é o orixá da cura, das doenças e da transformação. Senhor da terra e dos mistérios da vida e da morte, representa tanto a dor quanto a renovação. É protetor dos enfermos e dono do fogo interior que purifica e regenera.', 'Capa de palha, cajado', 'Atoto!', 'Paciente e curador', 'Rato', 'Terra', '13/08', 'O sincretismo de Obaluaê, um orixá ligado às doenças, curas e morte, é com São Lazaro e São Roque.', '2025-09-22 14:49:55', '2025-09-26 17:03:36'),
	(24, 'Nanã', 'Orixá das águas paradas, ancestralidade', 'https://i.pinimg.com/1200x/e7/75/86/e77586517f7523fb1c7cf9c3c285a0fc.jpg', 'orixa', 'Lilás e roxo', 'Terça-feira', 'Naná é a orixá das águas paradas, dos rios e dos lagos, associada à sabedoria, à fertilidade e à maternidade. Representa a ancestralidade e a força das mulheres, trazendo equilíbrio, paciência e proteção às famílias. É invocada para purificação, aconselhamento e cuidado espiritual', 'Cajado, cabaça', 'Saluba Nanã!', 'Sábia e reflexiva', 'Jacaré', 'Água', '26/07', 'O sincretismo de Nanã se dá com Nossa Senhora Sant\'Ana no catolicismo, sendo a avó de Jesus e celebrada no dia 26 de julho em religiões afro-brasileiras como a Umbanda e o Candomblé.', '2025-09-22 14:49:55', '2025-09-22 18:12:51'),
	(25, 'Oxumaré', 'Orixá da riqueza e movimento', 'https://i.pinimg.com/1200x/4a/47/a8/4a47a82d0d2372aa4c40db4901d09fad.jpg', 'orixa', 'Verde e amarelo', 'Terça-feira', 'Oxumaré é o orixá da serpente e do arco-íris, simbolizando a renovação, a riqueza e a transformação. Ligado à continuidade da vida e ao movimento constante, é chamado para trazer equilíbrio entre o céu e a terra, a prosperidade material e espiritual, e a fluidez das energias. Representa a dualidade e a união dos opostos, sendo um poderoso intermediário na mudança e na evolução pessoal', 'Serpente, arco-íris', 'Arroboboi!', 'Flexível e renovador', 'Serpente', 'Ar/Terra', '24/08', 'O sincretismo de Oxumaré, orixá africano das serpentes, do arco-íris e da renovação, ocorre com o santo católico São Bartolomeu.', '2025-09-22 14:49:55', '2025-09-22 18:14:47'),
	(27, 'Erê', 'Espírito infantil de alegria e brincadeira', 'https://i.pinimg.com/1200x/07/61/74/076174a542dc05c0b69aa5d9a76d8494.jpg', 'linha', 'Colorido', 'Sábado', 'Espírito infantil que traz leveza, alegria e proteção', 'Brinquedos, doces', 'Salve as Crianças!', 'Brincalhão e travesso', 'Criança', 'Ar', '01/01', NULL, '2025-09-22 14:51:40', '2025-09-23 21:56:33'),
	(28, 'Baiano', 'Espírito de força, proteção e sabedoria', 'https://i.pinimg.com/736x/ce/74/02/ce7402662a44e0ff922e6a912084668f.jpg', 'linha', 'Azul e branco', 'Domingo', 'Guias que trazem proteção e força nos trabalhos espirituais', 'Facão, tambor', 'Epa!', 'Corajoso e alegre', 'Cavalo', 'Terra', '02/07', NULL, '2025-09-22 14:51:40', '2025-09-23 22:06:33'),
	(29, 'Marinheiro', 'Espírito ligado ao mar e viagens', 'https://i.pinimg.com/1200x/51/d2/e8/51d2e8b2bc9aaf4fda6f1f2b97f498d8.jpg', 'linha', 'Azul', 'Sábado', 'Guia protetor das viagens e do mar', 'Âncora, corda', 'Laroiê!', 'Aventureiro e protetor', 'Golfinho', 'Água', '20/08', NULL, '2025-09-22 14:51:40', '2025-09-23 22:18:21'),
	(30, 'Cigano', 'Espírito da liberdade e alegria', 'https://i.pinimg.com/736x/56/4e/52/564e52fa5578d308e9dfdb170798e679.jpg', 'linha', 'Vermelho e dourado', 'Sexta-feira', 'Guias que trazem alegria, sorte e dança', 'Cartas, lenços coloridos', 'Optcha!', 'Sociável e alegre', 'Cavalo', 'Fogo', '05/09', NULL, '2025-09-22 14:51:40', '2025-09-23 22:27:13'),
	(31, 'Oxum', 'Orixá do amor, da fertilidade e das águas doces', 'https://i.pinimg.com/736x/b9/d6/73/b9d673dca9f8f3c257b6dbaa70030bf6.jpg', 'orixa', 'Amarelo e dourado', 'Sábado', '"Oxum é a deusa das águas doces, do amor e da fertilidade. Representa a beleza, a riqueza e a harmonia nos relacionamentos, sendo invocada para trazer prosperidade e carinho às famílias."', 'Espelhos, leques, pulseiras douradas', 'Oraieieo!', 'Carinhosa e vaidosa', 'Peixes, Cisnes', 'Água', '08/12', 'O sincretismo de Oxum refere-se à associação da Orixá africana Oxum com diferentes santas católicas, principalmente Nossa Senhora da Conceição, Aparecida e do Carmo.', '2025-09-22 14:57:03', '2025-09-30 22:00:21');

-- Copiando estrutura para tabela loja_ocultismo.encomendas
CREATE TABLE IF NOT EXISTS `encomendas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(255) DEFAULT NULL,
  `email_cliente` varchar(255) DEFAULT NULL,
  `telefone_cliente` varchar(50) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `observacoes` text,
  `total` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela loja_ocultismo.encomendas: ~3 rows (aproximadamente)
INSERT INTO `encomendas` (`id`, `nome_cliente`, `email_cliente`, `telefone_cliente`, `endereco`, `observacoes`, `total`, `created_at`, `updated_at`) VALUES
	(23, 'ggggggg', 'fsafsdfs@jadjas', '4344546', '123123', NULL, 80.00, '2025-09-30 21:57:03', '2025-09-30 21:57:03'),
	(24, 'ggggggg', 'fsafsdfs@jadjas', '4344546', '11111111', NULL, 289.90, '2025-09-30 22:33:52', '2025-09-30 22:33:52');

-- Copiando estrutura para tabela loja_ocultismo.encomenda_items
CREATE TABLE IF NOT EXISTS `encomenda_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `encomenda_id` bigint unsigned NOT NULL,
  `produto_id` bigint unsigned NOT NULL,
  `quantidade` int NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encomenda_items_encomenda_id_foreign` (`encomenda_id`),
  KEY `encomenda_items_produto_id_foreign` (`produto_id`),
  CONSTRAINT `encomenda_items_encomenda_id_foreign` FOREIGN KEY (`encomenda_id`) REFERENCES `encomendas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `encomenda_items_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.encomenda_items: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela loja_ocultismo.encomenda_itens
CREATE TABLE IF NOT EXISTS `encomenda_itens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `encomenda_id` bigint unsigned DEFAULT NULL,
  `produto_id` bigint unsigned DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `encomenda_id` (`encomenda_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `encomenda_itens_ibfk_1` FOREIGN KEY (`encomenda_id`) REFERENCES `encomendas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `encomenda_itens_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela loja_ocultismo.encomenda_itens: ~4 rows (aproximadamente)
INSERT INTO `encomenda_itens` (`id`, `encomenda_id`, `produto_id`, `quantidade`, `preco_unitario`, `subtotal`, `endereco`, `created_at`, `updated_at`) VALUES
	(20, 23, 3, 1, 80.00, 80.00, NULL, '2025-09-30 21:57:03', '2025-09-30 21:57:03'),
	(21, 24, 3, 1, 80.00, 80.00, NULL, '2025-09-30 22:33:52', '2025-09-30 22:33:52'),
	(22, 24, 2, 1, 120.00, 120.00, NULL, '2025-09-30 22:33:52', '2025-09-30 22:33:52'),
	(23, 24, 30, 1, 89.90, 89.90, NULL, '2025-09-30 22:33:52', '2025-09-30 22:33:52');

-- Copiando estrutura para tabela loja_ocultismo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2025_09_11_211418_create_categorias_table', 1),
	(2, '2025_09_11_211423_create_produtos_table', 1),
	(3, '2025_09_12_172207_create_sessions_table', 1),
	(4, '2025_09_18_234109_create_usuarios_table', 1),
	(5, '2025_09_19_005149_create_encomendas_table', 1),
	(6, '2025_09_26_143237_create_encomenda_itens_table', 2),
	(7, '2025_09_30_133719_create_encomenda_items_table', 3),
	(8, '2025_09_30_134932_add_endereco_to_encomendas_table', 4);

-- Copiando estrutura para tabela loja_ocultismo.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estoque` int NOT NULL DEFAULT '0',
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` decimal(8,2) DEFAULT NULL,
  `dimensoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `popular` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `observacoes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `produtos_nome_unique` (`nome`),
  KEY `produtos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.produtos: ~17 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `categoria_id`, `created_at`, `updated_at`, `estoque`, `codigo`, `peso`, `dimensoes`, `tags`, `popular`, `ativo`, `observacoes`) VALUES
	(2, 'Estátua de Ogum', 'Estátua para altar de Ogum', 120.00, 'https://i.pinimg.com/736x/e1/87/99/e18799dcb410a70b268cd60097a68cd2.jpg', 3, '2025-09-22 13:25:11', '2025-09-23 22:30:31', 5, 'ESTO001', 1.50, '20x10x10 cm', 'estatua,ogum', 1, 1, NULL),
	(3, 'Imagem de Iemanjá', 'Imagem da orixá Iemanjá', 80.00, 'https://i.pinimg.com/736x/23/36/01/23360118eaf87734c544ccec61a62a33.jpg', 2, '2025-09-22 13:25:11', '2025-09-23 22:37:24', 10, 'IMG001', 0.80, '15x10x5 cm', 'imagem,iemanja', 1, 1, NULL),
	(5, 'Guias de Caboclo', 'Colares para trabalhos espirituais', 30.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimg.elo7.com.br%2Fproduct%2Fzoom%2F46602D6%2Fguia-de-caboclo-umbanda-e-candomble-povodamata.jpg&f=1&nofb=1&ipt=81a28f2920c7d659b7376d7114bcaeaa4e0c9c8be5077ec857abac925353eb2a', 6, '2025-09-22 13:25:11', '2025-09-26 20:20:12', 15, 'GUIA001', 0.30, '15 cm', 'guia,caboclo', 1, 1, NULL),
	(6, 'Velas de Preto-Velho', 'Velas para oferendas e proteção', 12.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fdeaxeazambi.com.br%2Fwp-content%2Fuploads%2F2023%2F06%2FBranca-e-Preta-1-2048x2048.jpg&f=1&nofb=1&ipt=1a12e255c7c03ccc91bf00170e7653f7d3fa09f4166be7c04b82f90fe18669df', 7, '2025-09-22 13:25:11', '2025-09-26 20:21:18', 25, 'VPH001', 0.20, '10x3 cm', 'vela,preto-velho', 1, 1, NULL),
	(7, 'Estátua de Exu', 'Estátua protetora', 100.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F95%2F01%2Fbe%2F9501be01592a061787106154ef27f749.jpg&f=1&nofb=1&ipt=a80a44ca0cfe0c41386a6b18bebda6a2229bc4cd99fe75f3e1ab5cacbeeb93eb', 8, '2025-09-22 13:25:11', '2025-09-26 20:21:41', 7, 'ESTEX001', 1.20, '18x10x10 cm', 'estatua,exu', 1, 1, NULL),
	(8, 'Guias de Pomba Gira', 'Colares para trabalhos espirituais', 35.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimg.elo7.com.br%2Fproduct%2Fzoom%2F33CB7BC%2Fguia-de-pomba-gira-cigana-cristal-candomble-umbanda-pomba-gira.jpg&f=1&nofb=1&ipt=1edf300ab090d51a3f310845117594947e6e0d883762d25bed2643aa54eda5ef', 9, '2025-09-22 13:25:11', '2025-09-26 20:23:07', 12, 'GUIAPG001', 0.40, '15 cm', 'guia,pomba-gira', 1, 1, NULL),
	(9, 'Arruda', 'Erva de proteção e limpeza espiritual.', 20.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.paodeacucar.com%2Fimg%2Fuploads%2F1%2F852%2F585852.jpg&f=1&nofb=1&ipt=c004de1b4ca287c73351f3515841f0c6fa514ee26e2fff8bbeb6b6086cd0d0f6', 10, '2025-09-22 14:50:10', '2025-09-26 20:24:29', 5, 'ERV001', 0.05, '10x5x2 cm', 'protecao,limpeza', 1, 1, 'Uso em banhos e amuletos'),
	(10, 'Manjericão', 'Erva para prosperidade e equilíbrio.', 25.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.fafrural.com.br%2Fwp-content%2Fuploads%2F2020%2F04%2Ffeira-45-1.png&f=1&nofb=1&ipt=bd593c6015387b79cf7ae741ea08b28b4b82f0a7905b88a1ef737389d36c842f', 10, '2025-09-22 14:50:10', '2025-09-26 20:25:07', 40, 'ERV002', 0.05, '10x5x2 cm', 'prosperidade,harmonia', 1, 1, 'Pode ser usada em rituais ou incensos'),
	(11, 'Hortelã', 'Erva para limpeza e energização.', 60.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.tcdn.com.br%2Fimg%2Fimg_prod%2F763396%2Fhortela_maco_239_1_20200320145921.jpg&f=1&nofb=1&ipt=4666092ebf94d8005033517077140e3046f05a80f92f21cf1b3f39e1c06397e2', 10, '2025-09-22 14:50:10', '2025-09-26 20:25:59', 60, 'ERV003', 0.05, '10x5x2 cm', 'purificacao,energia', 1, 1, 'Uso em banhos, chás e rituais'),
	(12, 'Alecrim', 'Erva de proteção e purificação.', 15.95, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Furbanfarmipiranga.com.br%2Fwp-content%2Fuploads%2F2022%2F08%2F109-Alecrim-.jpg&f=1&nofb=1&ipt=a17a9a0ab798805d6657137ba4b0eb5389c855c490a7515d87cf62d327e44c43', 10, '2025-09-22 14:50:10', '2025-09-26 20:26:39', 45, 'ERV004', 0.05, '10x5x2 cm', 'protecao,energia', 1, 1, 'Pode ser usada em banhos e defumações'),
	(13, 'Camomila', 'Erva calmante e harmonizadora.', 49.90, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fhttp2.mlstatic.com%2Fflores-desidratadas-maco-de-camomila-D_NQ_NP_755806-MLB26715942909_012018-F.jpg&f=1&nofb=1&ipt=966de4e4b16563ba1bcb723217c5237047a1681c147bfb76b72dd994ee6ad9cb', 10, '2025-09-22 14:50:10', '2025-09-26 20:27:37', 50, 'ERV005', 0.05, '10x5x2 cm', 'calma,energia', 1, 1, 'Uso em chás e rituais'),
	(14, 'Ametista', 'Cristal violeta de equilíbrio e proteção.', 15.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F52%2F27%2Fb2%2F5227b203330a489f15c8e666c82bc265.jpg&f=1&nofb=1&ipt=80d71abd4106bd1c8a8f58b90d8b244cc33a69ac0be55504c75f13b35f20dbbb', 11, '2025-09-22 14:50:10', '2025-09-26 20:31:27', 25, 'PED001', 0.10, '4x4x4 cm', 'equilibrio,protecao', 1, 1, 'Pode ser usada em anéis, colares ou altar'),
	(15, 'Quartzo Rosa', 'Pedra do amor e harmonia.', 18.00, 'https://blog.flordejasminjoias.com.br/wp-content/uploads/2025/04/varias-pedras-de-quartzo-rosa-em-uma-bandeja-edited.png', 11, '2025-09-22 14:50:10', '2025-09-26 20:32:49', 20, 'PED002', 0.10, '4x4x4 cm', 'amor,harmonia', 1, 1, 'Uso em rituais de amor e proteção'),
	(16, 'Citrino', 'Pedra da prosperidade e energia positiva.', 20.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.almadecoral.com%2Fwp-content%2Fuploads%2F2022%2F06%2Fcomprar-piedra-citrino-joyas-bisuteria-1.jpg&f=1&nofb=1&ipt=4272df859050b6c6cf938f7c6939ba4a6d83f4ef92ec22fd6ac000bcd7e818bb', 11, '2025-09-22 14:50:10', '2025-09-26 20:33:16', 15, 'PED003', 0.12, '5x5x5 cm', 'prosperidade,energia', 1, 1, 'Pode ser usado em altar ou colar'),
	(17, 'Jade', 'Pedra da harmonia e equilíbrio.', 22.00, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fm.media-amazon.com%2Fimages%2FI%2F71fpVylrFIL._AC_SL1500_.jpg&f=1&nofb=1&ipt=2846d02802a121f4b73e2d5f961425b78da01fc2059de712ba68b370f1407aa1', 11, '2025-09-22 14:50:10', '2025-09-26 20:33:38', 18, 'PED004', 0.12, '5x5x5 cm', 'harmonia,equilibrio', 1, 1, 'Ideal para meditação ou colares'),
	(18, 'Turmalina Negra', 'Pedra de proteção energética.', 25.50, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Feltallerdelosminerales.com%2F8554-large_default%2Fturmalina-negra-en-estado-natural-25-x-25.jpg&f=1&nofb=1&ipt=da2ac3f269fe4ed191d4f93b5f67be431a6863ceeac2332ed7c55b5892d7f0b7', 11, '2025-09-22 14:50:10', '2025-09-26 20:34:02', 12, 'PED005', 0.15, '6x6x6 cm', 'protecao,energia', 1, 1, 'Colocar em ambientes ou altar'),
	(29, '06 Velas De 7 Dias Com Imagens De Orixás Iemanja - Azul', 'Conteúdo da vela: 6 velas 7 dias Iemanja 100% parafina\r\nCor Disponível: Azul Claro\r\nDuração: Aproximadamente 7 dias, sendo uma estimativa que pode variar de acordo com fatores como umidade, correntes de ar, temperatura e movimento das velas.', 65.50, 'https://http2.mlstatic.com/D_NQ_NP_2X_627853-MLB84390353709_052025-F-06-velas-de-7-dias-com-imagens-de-orixas-iemanja-azul-sf.webp', 2, '2025-09-30 22:13:41', '2025-09-30 22:13:41', 0, NULL, NULL, NULL, NULL, 0, 1, NULL),
	(30, '10 velas brancas de 7 dias', 'Velas votivas de longa duração, com queima contínua por 7 dias, ideais para uso prolongado\r\nFormato redondo e cor branca, proporcionando um visual clássico e minimalista\r\nConjunto de 1 velas, adequadas para uso decorativo e em contextos religiosos', 89.90, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fdown-br.img.susercontent.com%2Ffile%2Fbr-11134207-7qukw-lkb9i7extzl350&f=1&nofb=1&ipt=8401d662fb510e78019890122e6a3e0e5bc055355616452080472544bede79bb', 1, '2025-09-30 22:15:16', '2025-09-30 22:16:12', 0, NULL, NULL, NULL, NULL, 0, 1, NULL);

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
	('Ftvg3lIMRCmjS1FfcDIpxfADPz3MRZenDBHeiGJK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnNFUmVEOWxSYVpJTXh4UHlKb1pJTno4WjZ5T01mVWtOdXJsbjVKMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb250YXRvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1759260848),
	('IGDmbwq7NEicZxErtE6goT9TVSOC7gvJkQ3sHvJY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0pMZWhGM3hvZmVVbDh6ZHZ6NnZyaFZBWWZQTDhwRHZaZnpSUGVxaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdXRvcy8zMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759270294);

-- Copiando estrutura para tabela loja_ocultismo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('cliente','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cliente',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.usuarios: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
