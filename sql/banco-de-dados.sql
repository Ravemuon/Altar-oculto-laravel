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
	(1, 'Oxalá', 'Orixá da criação, pureza e paz', 'https://i.pinimg.com/1200x/9e/71/72/9e71720c0e49d57ebd70c7748ffe1a75.jpg', 'orixa', 'Branco', 'Sexta-Feira', 'Oxalá é considerado o pai de todos os orixás, símbolo da paz e da criação. É associado à luz, à sabedoria e à justiça, trazendo harmonia aos corações humanos e proteção espiritual.', 'Cajado, veste branca', 'Epa Baba!', 'Calmo e justo', 'Pombinha Branca', 'Ar', '21/12 - 25/12', 'O sincretismo associa Oxalá a Jesus Cristo, sendo a data de 25 de dezembro a principal conexão entre as duas figuras.', '2025-09-22 13:25:11', '2025-09-22 17:59:00'),
	(2, 'Iemanjá', 'Orixá das águas, proteção e maternidade', 'https://i.pinimg.com/736x/ce/73/94/ce7394ba19e7a4cf1572ffc82ab865b9.jpg', 'orixa', 'Azul e branco', 'Sábado', 'Iemanjá é a rainha do mar, mãe de todos os orixás e protetora dos pescadores. Suas águas simbolizam fertilidade, amor e proteção para a família, sendo cultuada em rituais de agradecimento e purificação.', 'Conchas, colares', 'Odoya! Odocya!', 'Mãe protetora', 'Peixes, Golfinhos', 'Água', '02/02 - 08/12', 'O sincretismo de Iemanjá no Brasil envolve sua associação com santas católicas, como Nossa Senhora dos Navegantes, Nossa Senhora das Candeias e a Virgem Maria', '2025-09-22 13:25:11', '2025-09-22 18:24:00'),
	(3, 'Ogum', 'Orixá da guerra e proteção', 'https://i.pinimg.com/736x/d2/08/01/d20801edcb09f8423341fb25d57c092c.jpg', 'orixa', 'Azul escuro e vermelho', 'Terça-feira', 'Ogum é o guerreiro que abre caminhos, senhor das estradas e da tecnologia. Protege os trabalhadores, combatentes e todos que buscam coragem para vencer obstáculos, sendo também patrono da força e do ferro.', 'Espada, ferro', 'Ogunhê!', 'Corajoso e direto', 'Cão', 'Fogo', '23/04', 'O sincretismo do orixá Ogum no Brasil o associa principalmente a São Jorge, um santo guerreiro católico, devido às semelhanças com o orixá africano da guerra, das ferramentas e da tecnologia.', '2025-09-22 13:25:11', '2025-09-22 18:01:48'),
	(4, 'Xangô', 'Orixá da justiça e força', 'https://i.pinimg.com/1200x/f5/6f/26/f56f260c89be042963aee00ce3a2adf2.jpg', 'orixa', 'Vermelho e branco', 'Quarta-feira', 'Xangô é o orixá da justiça e do fogo, senhor dos trovões e da força. É conhecido por seu poder de equilibrar o bem e o mal, e seus filhos são ensinados a agir com coragem, lealdade e sabedoria.', 'Machado duplo, pedras', 'Kaô Kabecile!', 'Justo e temperamental', 'Leão', 'Fogo', '30/09', 'O sincretismo de Xangô, orixá iorubá do trovão e da justiça, com santos católicos no Brasil, foi uma forma de resistência cultural durante a escravidão. Xangô é sincretizado principalmente com São Jerônimo.', '2025-09-22 13:25:11', '2025-09-22 18:08:34'),
	(5, 'Oxóssi', 'Orixá da caça e fartura', 'https://i.pinimg.com/1200x/f9/4c/00/f94c002b8e710425237972907d9d9d89.jpg', 'orixa', 'Verde', 'Quinta-feira', 'Oxóssi é o orixá da caça, da fartura e da sabedoria da floresta. Guardião das matas e dos animais, representa a astúcia, a paciência e o conhecimento das plantas e recursos naturais. É invocado para trazer sustento, proteção e equilíbrio com a natureza', 'Arco e flecha', 'Oke Aro!', 'Sagaz e paciente', 'Veado', 'Terra', '20/01', 'O sincretismo de Oxóssi é São Sebastião: Comum no Rio de Janeiro e em outras partes do país, a associação de Oxóssi com São Sebastião se deve a elementos como a flecha (o arco e a flecha de Oxóssi e as flechas que atingiram São Sebastião) e o caráter de proteção dos dois.', '2025-09-22 13:25:11', '2025-09-22 18:05:27'),
	(6, 'Caboclo', 'Espírito de proteção e sabedoria', 'https://i.pinimg.com/736x/c9/36/eb/c936eb95dd21daa45c49f3390f50ba1f.jpg', 'linha', 'Verde e marrom', 'Domingo', 'Guias da natureza e cura', 'Facão, penas', 'Oke Arô!', 'Sábio e protetor', 'Onça', 'Terra', '15/08', NULL, '2025-09-22 13:25:11', '2025-09-23 21:51:35'),
	(7, 'Preto-Velho', 'Espírito ancestral, conselheiro', 'https://i.pinimg.com/736x/25/0d/4a/250d4acfc0404033a8b4d4be13ee4c90.jpg', 'linha', 'Cinza', 'Sexta-feira', 'Ancião que guia e aconselha', 'Cajado, charutos', 'Adorei as Almas!', 'Calmo e experiente', 'Coruja', 'Ar', '01/11', NULL, '2025-09-22 13:25:11', '2025-09-23 21:49:45'),
	(8, 'Exu', 'Guardião dos caminhos e encruzilhadas', 'https://i.pinimg.com/736x/f4/ed/eb/f4edebbcf096ac24501fdda0b48cf3d8.jpg', 'linha', 'Vermelho e preto', 'Terça-feira', 'Mensageiro e guardião de caminhos', 'Tridente, chaves', 'Laroiê!', 'Astuto e rápido', 'Cachorro', 'Fogo', '25/12', NULL, '2025-09-22 13:25:11', '2025-09-23 21:53:47'),
	(9, 'Pomba Gira', 'Espírito feminino de força e sedução', 'https://i.pinimg.com/736x/b6/64/d0/b664d0a333e87a9a7ad8028c29aa9042.jpg', 'linha', 'Vermelho e rosa', 'Sábado', 'Encanta e protege nos trabalhos amorosos', 'Espelhos, leques', 'Epa!', 'Sensual e intensa', 'Cavalo', 'Fogo', '31/12', NULL, '2025-09-22 13:25:11', '2025-09-23 21:54:10'),
	(10, 'Ervas', 'Categoria destinada às ervas utilizadas em rituais e práticas espirituais.', 'https://i.pinimg.com/1200x/a2/28/f5/a228f571ac9c3d36955fcdf24d234a1f.jpg', 'Itens', 'verde, marrom', 'segunda-feira', 'Ervas usadas tradicionalmente para proteção, limpeza e energização.', 'folhas, raízes', 'Saudações às ervas', 'Calma, purificação', 'Coruja, cervo', 'Terra, água', '1º de cada mês', 'Algumas notas sobre uso e procedência das ervas', '2025-09-22 14:47:21', '2025-09-23 22:27:41'),
	(11, 'Pedras', 'Categoria destinada às pedras utilizadas em rituais e práticas espirituais.', 'https://i.pinimg.com/736x/39/8c/86/398c869811287b3e132e22dbf4f70d30.jpg', 'Itens', 'diversas', 'segunda-feira', 'Pedras usadas tradicionalmente para proteção, limpeza e energização.', 'Cristais, geodos', 'Saudações às pedras', 'Equilíbrio, energia positiva', 'Leão, coruja', 'Terra, fogo', '1º de cada mês', 'Algumas notas sobre uso e procedência das pedras', '2025-09-22 14:47:21', '2025-09-23 22:28:55'),
	(22, 'Iansã', 'Orixá dos ventos e tempestades, senhora da energia', 'https://i.pinimg.com/736x/10/e9/67/10e967205a8071cc194330e00340cf8c.jpg', 'orixa', 'Vermelho e marrom', 'Quarta-feira', 'Iansã, ou Oyá, é a senhora dos ventos e tempestades, orixá da transformação e da coragem. É associada à força, à paixão e à proteção contra injustiças, guiando aqueles que buscam mudança e liberdade.', 'Espada, chifres de boi', 'Odé! Eparrey!', 'Corajosa e independente', 'Cavalo', 'Ar', '04/12', 'Iansã, ou Oyá, é a senhora dos ventos e tempestades, orixá da transformação e da coragem. É associada à força, à paixão e à proteção contra injustiças, guiando aqueles que buscam mudança e liberdade.', '2025-09-22 14:49:55', '2025-09-22 18:07:53'),
	(23, 'Obaluaê/Omulu', 'Orixá da saúde, cura e transformação', 'https://i.pinimg.com/736x/29/db/c9/29dbc94fb3bf76ce0511538b637552ff.jpg', 'orixa', 'Branco e marrom', 'Segunda-feira', 'Protetor da saúde e doenças', 'Capa de palha, cajado', 'Atoto!', 'Paciente e curador', 'Rato', 'Terra', '13/08', 'O sincretismo de Obaluaê, um orixá ligado às doenças, curas e morte, é com São Lazaro e São Roque.', '2025-09-22 14:49:55', '2025-09-22 18:11:41'),
	(24, 'Nanã', 'Orixá das águas paradas, ancestralidade', 'https://i.pinimg.com/1200x/e7/75/86/e77586517f7523fb1c7cf9c3c285a0fc.jpg', 'orixa', 'Lilás e roxo', 'Terça-feira', 'Naná é a orixá das águas paradas, dos rios e dos lagos, associada à sabedoria, à fertilidade e à maternidade. Representa a ancestralidade e a força das mulheres, trazendo equilíbrio, paciência e proteção às famílias. É invocada para purificação, aconselhamento e cuidado espiritual', 'Cajado, cabaça', 'Saluba Nanã!', 'Sábia e reflexiva', 'Jacaré', 'Água', '26/07', 'O sincretismo de Nanã se dá com Nossa Senhora Sant\'Ana no catolicismo, sendo a avó de Jesus e celebrada no dia 26 de julho em religiões afro-brasileiras como a Umbanda e o Candomblé.', '2025-09-22 14:49:55', '2025-09-22 18:12:51'),
	(25, 'Oxumaré', 'Orixá da riqueza e movimento', 'https://i.pinimg.com/1200x/4a/47/a8/4a47a82d0d2372aa4c40db4901d09fad.jpg', 'orixa', 'Verde e amarelo', 'Terça-feira', 'Oxumaré é o orixá da serpente e do arco-íris, simbolizando a renovação, a riqueza e a transformação. Ligado à continuidade da vida e ao movimento constante, é chamado para trazer equilíbrio entre o céu e a terra, a prosperidade material e espiritual, e a fluidez das energias. Representa a dualidade e a união dos opostos, sendo um poderoso intermediário na mudança e na evolução pessoal', 'Serpente, arco-íris', 'Arroboboi!', 'Flexível e renovador', 'Serpente', 'Ar/Terra', '24/08', 'O sincretismo de Oxumaré, orixá africano das serpentes, do arco-íris e da renovação, ocorre com o santo católico São Bartolomeu.', '2025-09-22 14:49:55', '2025-09-22 18:14:47'),
	(27, 'Erê', 'Espírito infantil de alegria e brincadeira', 'https://i.pinimg.com/1200x/07/61/74/076174a542dc05c0b69aa5d9a76d8494.jpg', 'linha', 'Colorido', 'Sábado', 'Espírito infantil que traz leveza, alegria e proteção', 'Brinquedos, doces', 'Salve as Crianças!', 'Brincalhão e travesso', 'Criança', 'Ar', '01/01', NULL, '2025-09-22 14:51:40', '2025-09-23 21:56:33'),
	(28, 'Baiano', 'Espírito de força, proteção e sabedoria', 'https://i.pinimg.com/736x/ce/74/02/ce7402662a44e0ff922e6a912084668f.jpg', 'linha', 'Azul e branco', 'Domingo', 'Guias que trazem proteção e força nos trabalhos espirituais', 'Facão, tambor', 'Epa!', 'Corajoso e alegre', 'Cavalo', 'Terra', '02/07', NULL, '2025-09-22 14:51:40', '2025-09-23 22:06:33'),
	(29, 'Marinheiro', 'Espírito ligado ao mar e viagens', 'https://i.pinimg.com/1200x/51/d2/e8/51d2e8b2bc9aaf4fda6f1f2b97f498d8.jpg', 'linha', 'Azul', 'Sábado', 'Guia protetor das viagens e do mar', 'Âncora, corda', 'Laroiê!', 'Aventureiro e protetor', 'Golfinho', 'Água', '20/08', NULL, '2025-09-22 14:51:40', '2025-09-23 22:18:21'),
	(30, 'Cigano', 'Espírito da liberdade e alegria', 'https://i.pinimg.com/736x/56/4e/52/564e52fa5578d308e9dfdb170798e679.jpg', 'linha', 'Vermelho e dourado', 'Sexta-feira', 'Guias que trazem alegria, sorte e dança', 'Cartas, lenços coloridos', 'Optcha!', 'Sociável e alegre', 'Cavalo', 'Fogo', '05/09', NULL, '2025-09-22 14:51:40', '2025-09-23 22:27:13'),
	(31, 'Oxum', 'Orixá do amor, da fertilidade e das águas doces', 'https://i.pinimg.com/736x/b9/d6/73/b9d673dca9f8f3c257b6dbaa70030bf6.jpg', 'orixa', 'Amarelo e dourado', 'Sábado', '"Oxum é a deusa das águas doces, do amor e da fertilidade. Representa a beleza, a riqueza e a harmonia nos relacionamentos, sendo invocada para trazer prosperidade e carinho às famílias."', 'Espelhos, leques, pulseiras douradas', 'Oraieieo!', 'Carinhosa e vaidosa', 'Peixes, Cisnes', 'Água', '08/12', 'O sincretismo de Oxum refere-se à associação da Orixá africana Oxum com diferentes santas católicas, principalmente Nossa Senhora da Conceição, Aparecida e do Carmo.', '2025-09-22 14:57:03', '2025-09-22 18:17:01');

-- Copiando estrutura para tabela loja_ocultismo.encomendas
CREATE TABLE IF NOT EXISTS `encomendas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produto_id` bigint unsigned NOT NULL,
  `quantidade` int NOT NULL DEFAULT '1',
  `total` decimal(10,2) DEFAULT NULL,
  `observacoes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encomendas_produto_id_foreign` (`produto_id`),
  CONSTRAINT `encomendas_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.encomendas: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela loja_ocultismo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.migrations: ~5 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2025_09_11_211418_create_categorias_table', 1),
	(2, '2025_09_11_211423_create_produtos_table', 1),
	(3, '2025_09_12_172207_create_sessions_table', 1),
	(4, '2025_09_18_234109_create_usuarios_table', 1),
	(5, '2025_09_19_005149_create_encomendas_table', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela loja_ocultismo.produtos: ~18 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `categoria_id`, `created_at`, `updated_at`, `estoque`, `codigo`, `peso`, `dimensoes`, `tags`, `popular`, `ativo`, `observacoes`) VALUES
	(1, 'Velas de Oxalá', 'Velas brancas para oferenda', 15.00, 'https://http2.mlstatic.com/D_NQ_NP_804876-MLB78358727185_082024-O-vela-palito-n-2-maco-c-8-unidades-branca-12g-c-nfe.webp', 1, '2025-09-22 13:25:11', '2025-09-23 21:48:45', 20, 'VXO001', 0.20, '10x3 cm', 'vela,oxala,oferta', 1, 1, NULL),
	(2, 'Estátua de Ogum', 'Estátua para altar de Ogum', 120.00, 'https://i.pinimg.com/736x/e1/87/99/e18799dcb410a70b268cd60097a68cd2.jpg', 3, '2025-09-22 13:25:11', '2025-09-23 22:30:31', 5, 'ESTO001', 1.50, '20x10x10 cm', 'estatua,ogum', 1, 1, NULL),
	(3, 'Imagem de Iemanjá', 'Imagem da orixá Iemanjá', 80.00, 'https://i.pinimg.com/736x/23/36/01/23360118eaf87734c544ccec61a62a33.jpg', 2, '2025-09-22 13:25:11', '2025-09-23 22:37:24', 10, 'IMG001', 0.80, '15x10x5 cm', 'imagem,iemanja', 1, 1, NULL),
	(4, 'Patuá de Oxóssi', 'Amuleto protetor', 25.00, 'https://via.placeholder.com/300x200?text=Oxóssi', 5, '2025-09-22 13:25:11', '2025-09-22 13:25:11', 30, 'PAT001', 0.10, '5x5 cm', 'amulet,oxossi', 1, 1, ''),
	(5, 'Guias de Caboclo', 'Colares para trabalhos espirituais', 30.00, 'https://via.placeholder.com/300x200?text=Caboclo', 6, '2025-09-22 13:25:11', '2025-09-22 13:25:11', 15, 'GUIA001', 0.30, '15 cm', 'guia,caboclo', 1, 1, ''),
	(6, 'Velas de Preto-Velho', 'Velas para oferendas e proteção', 12.00, 'https://via.placeholder.com/300x200?text=Preto-Velho', 7, '2025-09-22 13:25:11', '2025-09-22 13:25:11', 25, 'VPH001', 0.20, '10x3 cm', 'vela,preto-velho', 1, 1, ''),
	(7, 'Estátua de Exu', 'Estátua protetora', 100.00, 'https://via.placeholder.com/300x200?text=Exu', 8, '2025-09-22 13:25:11', '2025-09-22 13:25:11', 7, 'ESTEX001', 1.20, '18x10x10 cm', 'estatua,exu', 1, 1, ''),
	(8, 'Guias de Pomba Gira', 'Colares para trabalhos espirituais', 35.00, 'https://via.placeholder.com/300x200?text=Pomba+Gira', 9, '2025-09-22 13:25:11', '2025-09-22 13:25:11', 12, 'GUIAPG001', 0.40, '15 cm', 'guia,pomba-gira', 1, 1, ''),
	(9, 'Arruda', 'Erva de proteção e limpeza espiritual.', 5.50, 'https://exemplo.com/arruda.jpg', 10, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 50, 'ERV001', 0.05, '10x5x2 cm', 'protecao,limpeza', 1, 1, 'Uso em banhos e amuletos'),
	(10, 'Manjericão', 'Erva para prosperidade e equilíbrio.', 6.00, 'https://exemplo.com/manjericao.jpg', 10, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 40, 'ERV002', 0.05, '10x5x2 cm', 'prosperidade,harmonia', 1, 1, 'Pode ser usada em rituais ou incensos'),
	(11, 'Hortelã', 'Erva para limpeza e energização.', 4.50, 'https://exemplo.com/hortela.jpg', 10, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 60, 'ERV003', 0.05, '10x5x2 cm', 'purificacao,energia', 1, 1, 'Uso em banhos, chás e rituais'),
	(12, 'Alecrim', 'Erva de proteção e purificação.', 5.00, 'https://exemplo.com/alecrim.jpg', 10, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 45, 'ERV004', 0.05, '10x5x2 cm', 'protecao,energia', 1, 1, 'Pode ser usada em banhos e defumações'),
	(13, 'Camomila', 'Erva calmante e harmonizadora.', 4.80, 'https://exemplo.com/camomila.jpg', 10, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 50, 'ERV005', 0.05, '10x5x2 cm', 'calma,energia', 1, 1, 'Uso em chás e rituais'),
	(14, 'Ametista', 'Cristal violeta de equilíbrio e proteção.', 15.00, 'https://exemplo.com/ametista.jpg', 11, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 25, 'PED001', 0.10, '4x4x4 cm', 'equilibrio,protecao', 1, 1, 'Pode ser usada em anéis, colares ou altar'),
	(15, 'Quartzo Rosa', 'Pedra do amor e harmonia.', 18.00, 'https://exemplo.com/quartzo_rosa.jpg', 11, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 20, 'PED002', 0.10, '4x4x4 cm', 'amor,harmonia', 1, 1, 'Uso em rituais de amor e proteção'),
	(16, 'Citrino', 'Pedra da prosperidade e energia positiva.', 20.00, 'https://exemplo.com/citrino.jpg', 11, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 15, 'PED003', 0.12, '5x5x5 cm', 'prosperidade,energia', 1, 1, 'Pode ser usado em altar ou colar'),
	(17, 'Jade', 'Pedra da harmonia e equilíbrio.', 22.00, 'https://exemplo.com/jade.jpg', 11, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 18, 'PED004', 0.12, '5x5x5 cm', 'harmonia,equilibrio', 1, 1, 'Ideal para meditação ou colares'),
	(18, 'Turmalina Negra', 'Pedra de proteção energética.', 25.00, 'https://exemplo.com/turmalina_negra.jpg', 11, '2025-09-22 14:50:10', '2025-09-22 14:50:10', 12, 'PED005', 0.15, '6x6x6 cm', 'protecao,energia', 1, 1, 'Colocar em ambientes ou altar');

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
	('dpPuWOZeEAQBJqgxX2gdBadK0Rbnr6HY7eH6kJie', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 OPR/122.0.0.0 (Edition std-2)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicW5ldGNwNDRBYzF3MWg1OFdjQVdaWXdjelNMTTVLVk9VNnNVYTNzcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758657111);

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
