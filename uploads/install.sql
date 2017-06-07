-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2017 at 10:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcinfotech_bizpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `about`) VALUES
(1, 'John Doe', 'admin@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Sample quotes about ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('19b7fbf40b2c3ca365e90685555941d4b3a3756d', '::1', 1488185855, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438383138353835353b);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount_percentage` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damaged_product`
--

DROP TABLE IF EXISTS `damaged_product`;
CREATE TABLE `damaged_product` (
  `damaged_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `vat_percentage` int(11) NOT NULL,
  `sub_total` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grand_total` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `chinese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dutch` longtext COLLATE utf8_unicode_ci NOT NULL,
  `polish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `german` longtext COLLATE utf8_unicode_ci NOT NULL,
  `french` longtext COLLATE utf8_unicode_ci NOT NULL,
  `italian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `russian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `portugese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `turkish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `korean` longtext COLLATE utf8_unicode_ci NOT NULL,
  `greek` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `spanish`, `chinese`, `dutch`, `polish`, `german`, `french`, `italian`, `russian`, `portugese`, `turkish`, `korean`, `greek`) VALUES
(1, 'customers', 'Customers', 'Clientes', '客户', 'Klanten', 'Klientela', 'Kundschaft', 'Clientèle', 'Clienti', 'Клиенты', 'Clientes', 'Müşteriler', '고객', 'Πελάτες'),
(2, 'suppliers', 'Suppliers', 'Proveedores', '供应商', 'Leveranciers', 'Dostawcy', 'Lieferanten', 'Fournisseurs', 'Fornitori', 'Поставщики', 'Fornecedores', 'Tedarikçiler', '공급 업체', 'Προμηθευτές'),
(3, 'products', 'Products', 'Productos', '制品', 'Producten', 'Produkty', 'Produkte', 'Produits', 'Prodotti', 'Продукты', 'Produtos', 'Ürünler', '제품', 'Προϊόντα'),
(4, 'product_barcodes', 'Product Barcodes', 'Los códigos de barras del producto', '商品条码', 'Product Barcodes', 'Kody kreskowe produktów', 'Produkt-Barcodes', 'Les codes à barres du produit', 'Codici a barre del prodotto', 'Штрих-коды товаров', 'Os códigos de barras do produto', 'Ürün Barkodlar', '제품 바코드', 'Barcodes Προϊόν'),
(5, 'product_categories', 'Product Categories', 'Categorías de productos', '产品分类', 'Categorieën van het product', 'Kategorie produktów', 'Produktkategorien', 'catégories de produit', 'Categorie di prodotti', 'Категории продуктов', 'Categorias de Produtos', 'Ürün Kategorileri', '제품 카테고리', 'Κατηγορίες Προϊόντων'),
(6, 'product_sub_categories', 'Product Sub Categories', 'Sub Producto Categorías', '产品子分类', 'Product Sub Categories', 'Sub produktu Kategorie', 'Produktunterkategorien', 'Sous de produit Catégories', 'Prodotto Sotto categorie', 'Sub товаров Рубрики', 'Sub produto Categorias', 'Ürün Alt Kategoriler', '제품 하위 범주', 'Υπο Κατηγορίες Προϊόντων'),
(7, 'damaged_products', 'Damaged Products', 'Productos dañados', '损坏的产品', 'Beschadigde producten', 'Uszkodzone produkty', 'Beschädigte Produkte', 'Produits endommagés', 'Prodotti danneggiati', 'Поврежденные изделия', 'Produtos Danificados', 'Hasarlı Ürünler', '손상된 제품', 'Κατεστραμμένα Προϊόντα'),
(8, 'create_new_order', 'Create New Order', 'Crear Nuevo Orden', '创建新订单', 'Maak New Order', 'Create New Order', 'Erstellen New Order', 'Créer New Order', 'Crea nuovo ordine', 'Новое распоряжение', 'Criar Nova Ordem', 'Yeni Sipariş Oluştur', '뉴 오더 생성', 'Δημιουργία Νέας Τάξης'),
(9, 'pending_orders', 'Pending Orders', 'Pedidos pendientes', '挂单', 'In afwachting van Bestellingen', 'Zamówienia w toku', 'Pending Orders', 'Les ordres en attente', 'In attesa di ordini', 'Отложенные ордера', 'Pedidos Pendentes', 'Siparişler Bekleyen', '주문을 보류', 'Εν αναμονή Παραγγελίες'),
(10, 'approved_orders', 'Approved Orders', 'Órdenes Aprobados', '已批准的订单', 'Goedgekeurd Bestellingen', 'Zatwierdzone Zamówienia', 'Genehmigt Bestellungen', 'Décrets approuvés', 'Ordini approvati', 'Утвержденные Заказы', 'Pedidos aprovados', 'Onaylı Siparişler', '승인 주문', 'Εγκρίθηκε Παραγγελίες'),
(11, 'rejected_orders', 'Rejected Orders', 'Órdenes Rechazadas', '拒绝订单', 'Afgewezen Bestellingen', 'Zamówienia odrzuconych', 'Abgelehnt Bestellungen', 'Ordres rejetés', 'Ordini rifiutate', 'Забракованные Заказы', 'Pedidos rejeitados', 'Reddedilen Siparişler', '거부 주문', 'Απορρίφθηκε Παραγγελίες'),
(12, 'new_purchase', 'New Purchase', 'Nueva compra', '新购', 'Nieuwe aankoop', 'Nowy Zakup', 'Neuanschaffung', 'Nouvel achat', 'Nuovo Acquisto', 'Новый Покупка', 'New Purchase', 'Yeni Alım', '새로운 구매', 'Νέα Αγοράς'),
(13, 'purchase_history', 'Purchase History', 'Historial de compras', '购买历史', 'Aankoop Geschiedenis', 'Historia Zakupów', 'Kauf-Historie', 'Historique D\'Achat', 'Cronologia Degli Acquisti', 'История покупок', 'Histórico de Compras', 'Satınalma Geçmişi', '구매 내역', 'Ιστορικό αγορών'),
(14, 'create_new_sale', 'Create New Sale', 'Crear nueva venta', '创建新的销售', 'Nieuwe Sale', 'Utwórz nową Sprzedaż', 'Neues Sale', 'Créer un nouveau Vente', 'Crea nuovo Vendita', 'Создать Продажа', 'Criar novo Venda', 'Yeni Sale Oluştur', '새로운 판매 만들기', 'Δημιουργία νέου Πώληση'),
(15, 'sale_invoices', 'Sale Invoices', 'Venta Facturas', '销售发票', 'Verkoop Facturen', 'Faktury sprzedaży', 'Verkauf Rechnungen', 'Factures de vente', 'Vendita Fatture', 'Продажа счетов-фактур', 'Facturas de venda', 'Satış Faturaları', '판매 송장', 'Πώληση Τιμολόγια'),
(16, 'private_messaging', 'Private Messaging', 'Mensajería privada', '悄悄话', 'Private Messaging', 'Prywatne Wiadomości', 'Private Nachrichten', 'Messagerie Privée', 'Messaggi Privati', 'Личные сообщения', 'Mensagens Privadas', 'Özel Mesajlaşma', '비공개 메시지', 'Προσωπικά Μηνύματα'),
(17, 'system_settings', 'System Settings', 'Configuración del sistema', '系统设置', 'System Settings', 'Ustawienia Systemu', 'Systemeinstellungen', 'Paramètres système', 'Impostazioni Di Sistema', 'Системные Настройки', 'Configurações do sistema', 'Sistem Ayarları', '시스템 설정', 'Ρυθμίσεις συστήματος'),
(18, 'manage_branches', 'Manage Branches', 'Administrar Ramas', '管理分行', 'Beheer Branches', 'Zarządzaj Oddziałów', 'Branches verwalten', 'Gérer Branches', 'Gestisci Filiali', 'Управление Филиалы', 'Gerencie Ramos', 'Dallar yönetin', '지점 관리', 'Διαχειριστείτε Υποκαταστήματα'),
(19, 'branches', 'Branches', 'Ramas', '分行', 'Branches', 'Branże', 'Geäst', 'Branches', 'Filiali', 'Ветви', 'Ramos', 'Şubeler', '지점', 'Υποκαταστήματα'),
(20, 'branch_managers', 'Branch Managers', 'Los gerentes de sucursal', '分公司经理', 'Branch Managers', 'Kierownicy oddziałów', 'Niederlassungsleiter', 'Les gestionnaires de la Direction générale', 'Responsabili di Filiale', 'Менеджеры Отрасль', 'Gerentes de agências', 'Şube Müdürleri', '지점장', 'Διευθυντές Καταστημάτων'),
(21, 'dashboard', 'Dashboard', 'Salpicadero', '仪表盘', 'Dashboard', 'Tablica rozdzielcza', 'Armaturenbrett', 'Tableau de bord', 'Cruscotto', 'Приборная панель', 'Painel de instrumentos', 'Gösterge paneli', '계기판', 'Ταμπλό'),
(22, 'add_new_branch', 'Add New Branch', 'Añadir Nueva Sucursal', '添加新科', 'Nieuwe toevoegen Branch', 'Dodaj nowy oddział', 'Neue Niederlassung', 'Ajouter une nouvelle Direction', 'Aggiungi nuovo Branch', 'Добавить новый филиал', 'Adicionar novo ramo', 'Yeni Branch Ekle', '새로운 지점을 추가', 'Προσθήκη νέου Καταστήματος'),
(23, 'code', 'Code', 'Código', '代码', 'Code', 'Kod', 'Code', 'Code', 'Codice', 'Код', 'Código', 'Kod', '코드', 'Κωδικός'),
(24, 'name', 'Name', 'Nombre', '名字', 'Naam', 'Nazwa', 'Name', 'Nom', 'Nome', 'Имя', 'Nome', 'Isim', '이름', 'Όνομα'),
(25, 'description', 'Description', 'Descripción', '描述', 'Beschrijving', 'Opis', 'Beschreibung', 'Description', 'Descrizione', 'Описание', 'Descrição', 'Tanım', '기술', 'Περιγραφή'),
(26, 'address', 'Address', 'Dirección', '地址', 'Adres', 'Adres', 'Adresse', 'Adresse', 'Indirizzo', 'Адрес', 'Endereço', 'Adres', '주소', 'Διεύθυνση'),
(27, 'phone', 'Phone', 'Teléfono', '电话', 'Telefoon', 'Telefon', 'Telefon', 'Téléphone', 'Telefono', 'Телефон', 'Telefone', 'Telefon', '전화', 'Τηλέφωνο'),
(28, 'manager', 'Manager', 'Gerente', '经理', 'Manager', 'Menedżer', 'Manager', 'Directeur', 'Direttore', 'Менеджер', 'Gerente', 'Yönetici', '매니저', 'Διευθυντής'),
(29, 'options', 'Options', 'Opciones', '选项', 'Opties', 'Opcje', 'Options', 'Options', 'Opzioni', 'Опции', 'Opções', 'Seçenekler', '옵션', 'Επιλογές'),
(30, 'branch_code', 'Branch Code', 'Código Branch', '分行代码', 'Branch Code', 'Kod oddziału', 'Branch Code', 'Code Direction', 'Codice Della Filiale', 'Код Отрасль', 'Filial Código', 'Şube Kodu', '지점 코드', 'Κωδικός Υποκαταστήματος'),
(31, 'branch_name', 'Branch Name', 'Rama Nombre', '分公司名称', 'Branch Naam', 'Oddział Nazwa', 'Namen der Niederlassung', 'Nom de la direction', 'Branch Nome', 'Название филиала', 'Filial Nome', 'Şube Adı', '지점 이름', 'Υποκατάστημα Όνομα'),
(32, 'branch_description', 'Branch Description', 'Descripción de la Sucursal', '分公司介绍', 'Branch Beschrijving', 'Oddział Opis', 'Niederlassung Beschreibung', 'Description de Direction', 'Descrizione Filiale', 'Отрасль Описание', 'Filial Descrição', 'Şube Açıklama', '지점 설명', 'Υποκατάστημα Περιγραφή'),
(33, 'branch_address', 'Branch Address', 'Dirección De Sucursal', '分公司地址', 'Branch Adres', 'Oddział Adres', 'Verzweigungsadreßberechner', 'Adresse de la succursale', 'Filiale Indirizzo', 'Отрасль Адрес', 'Filial Endereço', 'Şube Adresi', '지점 주소', 'Διεύθυνση Υποκαταστήματος'),
(34, 'branch_phone_number', 'Branch Phone Number', 'Sucursal Número de teléfono', '分公司电话号码', 'Branch Telefoonnummer', 'Oddział numer telefonu', 'Zweig Telefonnummer', 'Direction générale numéro de téléphone', 'Branch Numero di telefono', 'Отрасль номер телефона', 'Número de telefone filial', 'Şube Telefon Numarası', '지점 전화 번호', 'Υποκατάστημα Τηλέφωνο'),
(35, 'data_added_successfully', 'Data Added Successfully', 'Datos Añadido éxito', '新增的数据成功', 'Gegevens Toegevoegd Succesvol', 'Dane pomyślnie dodany', 'Daten erfolgreich hinzugefügt', 'Données Ajouté succès', 'Dati Aggiunto con successo', 'Данные Добавлено успешно', 'Dados adicionado com sucesso', 'Veri Eklendi Başarıyla', '데이터 추가 성공적으로', 'Δεδομένα προστέθηκε με επιτυχία'),
(36, 'edit', 'Edit', 'Editar', '编辑', 'Uitgeven', 'Edycja', 'Bearbeiten', 'Éditer', 'Modifica', 'Редактировать', 'Editar', 'Düzenle', '편집', 'Επεξεργασία'),
(37, 'delete', 'Delete', 'Borrar', '删除', 'Verwijder', 'Usunąć', 'Löschen', 'Effacer', 'Cancellare', 'Удалять', 'Excluir', 'Silmek', '삭제', 'Διαγραφή'),
(38, 'edit_branch', 'Edit Branch', 'Editar Branch', '编辑分公司', 'Bewerken Branch', 'Edycja Oddział', 'Zweig bearbeiten', 'Modifier Direction', 'Modifica Branch', 'Редактировать Отрасль', 'Editar Filial', 'Düzenleme Şubesi', '편집 지점', 'Επεξεργασία Υποκατάστημα'),
(39, 'informations_updated', 'Updated Information', 'Información Actualizada', '更新信息', 'Bijgewerkte informatie', 'Aktualizacja informacji', 'Aktuelle Informationen', 'Informations Updated', 'Informazioni aggiornate', 'Обновленная информация', 'Informações atualizadas', 'Güncel Bilgiler', '업데이트 정보', 'Ενημερώθηκε Πληροφορίες'),
(40, 'data_deleted', 'Data Deleted', 'Datos eliminados', '数据删除', 'Gegevens Deleted', 'Dane skasowane', 'Gelöschter Daten', 'Données supprimées', 'Dati cancellati', 'Данные удаленных', 'Dados apagados', 'Veri Silindi', '데이터 삭제', 'Τα δεδομένα διαγράφονται'),
(41, 'login', 'Login', 'Login', '注册', 'Log In', 'Zaloguj Się', 'Login', 'Login', 'Login', 'Войти', 'Login', 'Oturum Aç', '로그인', 'Σύνδεση'),
(42, 'sign_me_in', 'Sign Me In', 'Regístrate Me In', '登录我', 'Meld Me In', 'Zarejestruj mnie', 'Registrieren Me In', 'Inscrivez-vous Me In', 'Accedi Me In', 'Войдите Me In', 'Registe-Me In', 'Me Sign', '나를 로그인', 'Εγγραφείτε Me In'),
(43, 'forgot_password', 'Forgot Password', 'Olvidé mi contraseña', '忘记密码', 'Wachtwoord Vergeten', 'Zapomniałeś Hasła', 'Passwort vergessen', 'Mot de passe oublié', 'Password Dimenticata', 'Забыли Пароль', 'Esqueceu sua senha', 'Parolanızı Mı Unuttunuz', '비밀번호 찾기', 'Ξεχάσατε Τον Κωδικό'),
(44, 'enter_email', 'Enter Email', 'Ingrese Email', '输入电子邮件', 'Voer Email', 'Podaj e-mail', 'Ihre Email-', 'Saisissez votre email', 'Inserisci e-mail', 'Введите e-mail', 'Digite o e-mail', 'E-posta girin', '이메일 주소를 입력', 'Εισάγετε το Email'),
(45, 'enter_password', 'Enter Password', 'Introduzca la contraseña', '输入密码', 'Voer Wachtwoord In', 'Wpisz Hasło', 'Passwort eingeben', 'Entrez le mot de passe', 'Inserire La Password', 'Введите Пароль', 'Insira a senha', 'Parola Gir', '암호를 입력', 'Εισάγετε Τον Κωδικό Πρόσβασης'),
(46, 'recover', 'Recover', 'Recuperar', '恢复', 'Herstellen', 'Wyzdrowieć', 'Gewinnen', 'Récupérer', 'Recuperare', 'Восстанавливать', 'Recuperar', 'Kurtarmak', '복구', 'Ανάκτηση'),
(47, 'back_to_login', 'Back To Login', 'Volver a inicio', '返回登陆', 'Terug naar Inloggen', 'Wróć do strony logowania', 'Zurück zur Anmeldung', 'Retour à la connexion', 'Torna al login', 'Вернуться на страницу входа', 'Voltar para o Login', 'Geri Girişi için', '돌아 가기 로그인', 'Επιστροφή στην σελίδα εισόδου'),
(48, 'manage_branch', 'Manage Branch', 'Administrar Branch', '管理科', 'Beheer Branch', 'Zarządzaj Oddział', 'Filiale verwalten', 'Gérer Direction', 'Gestisci Branch', 'Управление филиал', 'Gerencie Filial', 'Şube yönetin', '지점 관리', 'Διαχειριστείτε Υποκατάστημα'),
(49, 'customer', 'Customer', 'Cliente', '顾客', 'Klant', 'Klient', 'Kunde', 'Client', 'Cliente', 'Клиент', 'Cliente', 'Müşteri', '고객', 'Πελάτης'),
(50, 'supplier', 'Supplier', 'Proveedor', '供应商', 'Leverancier', 'Dostawca', 'Lieferant', 'Fournisseur', 'Fornitore', 'Поставщик', 'Fornecedor', 'Satıcı', '공급 업체', 'Προμηθευτής'),
(51, 'manage_products', 'Manage Products', 'Administrar Productos', '管理产品', 'Beheer producten', 'Zarządzaj produkty', 'Produktverwaltung', 'Gérer Produits', 'Gestione Prodotti', 'Управление продуктами', 'Gerencie produtos', 'Ürünler yönetin', '제품 관리', 'Διαχειριστείτε Προϊόντα'),
(52, 'product', 'Product', 'Producto', '产品', 'Product', 'Produkt', 'Produkt', 'Produit', 'Prodotto', 'Продукт', 'Produto', 'Ürün', '생성물', 'Προϊόν'),
(53, 'prodcut_barcode', 'Prodcut Barcode', 'Barcode Prodcut', 'PRODCUT条码', 'Prodcut Barcode', 'Prodcut Barcode', 'Prodcut Barcode', 'Barcode prodcut', 'Barcode Prodcut', 'Prodcut Штрих', 'Barcode Prodcut', 'Dürtmek Barkod', 'Prodcut 바코드', 'Prodcut Barcode'),
(54, 'category', 'Category', 'Categoría', '类别', 'Categorie', 'Kategoria', 'Kategorie', 'Catégorie', 'Categoria', 'Категория', 'Categoria', 'Kategori', '범주', 'Κατηγορία'),
(55, 'sub_category', 'Sub Category', 'Sub Categoría', '子类别', 'Sub Categorie', 'Podkategoria', 'Unterkategorie', 'Sous catégorie', 'Sotto categoria', 'Подкатегория', 'Sub Categoria', 'Alt Kategori', '하위 카테고리', 'Υπο Κατηγορία'),
(56, 'damaged_product', 'Damaged Product', 'Dañado Producto', '损坏的产品', 'Beschadigde product', 'Uszkodzony produkt', 'Beschädigte Produkte', 'Produit endommagé', 'Prodotto danneggiato', 'Поврежденные товаров', 'Produto danificado', 'Hasarlı Ürün', '손상된 제품', 'Κατεστραμμένο Προϊόν'),
(57, 'branch', 'Branch', 'Rama', '支', 'Tak', 'Oddział', 'Niederlassung', 'Branche', 'Ramo', 'Филиал', 'Ramo', 'Şube', '분기', 'Υποκατάστημα'),
(58, 'branch_manager', 'Branch Manager', 'Gerente de la Sucursal', '分公司经理', 'Branch Manager', 'Kierownik Oddziału', 'Niederlassungsleiter', 'Branch Manager', 'Branch manager', 'Руководитель филиала', 'Gerente da Filial', 'Şube Müdürü', '지점 관리자', 'Διευθυντής Του Υποκαταστήματος'),
(59, 'all_branches', 'All Branches', 'Todas las Sucursales', '各分公司', 'Alle Branches', 'Wszystkie Branże', 'Alle Branchen', 'Toutes les succursales', 'Tutti i rami', 'Все филиалы', 'Todos os Ramos', 'Tüm Branşlar', '모든 지점', 'Όλα τα Υποκαταστήματα'),
(60, 'save_branch', 'Save Branch', 'Guardar Branch', '保存科', 'Save Branch', 'Zapisz Oddział', 'Niederlassung speichern', 'Sauvegarder Direction', 'Salva Branch', 'Сохранить Отрасль', 'Salvar Filial', 'Kaydet Şubesi', '저장 지점', 'Αποθήκευση Κατάστημα'),
(61, 'update', 'Update', 'Actualización', '更新', 'Bijwerken', 'Aktualizacja', 'Aktualisierung', 'Mettre à jour', 'Aggiornare', 'Обновление', 'Atualizar', 'Güncelleştirme', '업데이트', 'Ενημέρωση'),
(62, 'add_new_branch_manager', 'Add New Branch Manager', 'Agregar nuevo director de sucursal', '添加新的分公司经理', 'Nieuwe toevoegen Branch Manager', 'Dodaj nowy Kierownik Oddziału', 'Neue Niederlassungsleiter', 'Ajouter un nouveau directeur de la succursale', 'Aggiungi nuovo Responsabile di filiale', 'Добавить директор филиала', 'Adicionar Novo Gerente da Filial', 'Yeni Şube Müdürü Ekle', '새로운 지점 관리자를 추가', 'Προσθήκη νέου Διευθυντής Υποκαταστήματος'),
(63, 'all_branch_managers', 'All Branch Managers', 'Todos los Directores de Oficina', '所有分公司经理', 'Alle Branch Managers', 'Wszystkie kierowników oddziałów', 'Alle Niederlassungsleiter', 'Tous les directeurs de succursale', 'Tutti i Responsabili di Filiale', 'Все менеджеры Отрасль', 'Todos os gerentes de agências', 'Tüm Şube Müdürleri', '모든 지점장', 'Όλους τους διευθυντές υποκαταστημάτων'),
(64, 'email', 'Email', 'Correo', '电子邮件', 'Email', 'E-mail', 'E-Mail-', 'Email', 'Email', 'E-mail', 'Email', 'E-posta', '이메일', 'Email'),
(65, 'branch_manager_name', 'Branch Manager Name', 'Rama Entrenador Nombre', '分公司经理姓名', 'Branch Manager Naam', 'Kierownik Oddziału Nazwa', 'Zweig Manager Name', 'Nom de la direction du gestionnaire', 'Branch manager Nome', 'Руководитель филиала Имя', 'Gerente de Filial Nome', 'Şube Müdürü Adı', '지점 관리자 이름', 'Διευθυντής Καταστήματος Όνομα'),
(66, 'branch_manager_email', 'Branch Manager Email', 'Gerente de Sucursal Email', '分公司经理电子邮件', 'Branch Manager E-mail', 'E-mail Dyrektor Oddziału', 'Niederlassungsleiter E-Mail', 'Branch Manager Email', 'Branch Manager Invia', 'Руководитель филиала E-mail', 'Gerente de Filial Email', 'Şube Müdürü Email', '지점 관리자 이메일', 'Διευθυντής Υποκαταστήματος Email'),
(67, 'password', 'Password', 'Contraseña', '密码', 'Wachtwoord', 'Hasło', 'Passwort', 'Mot de passe', 'Password', 'Пароль', 'Senha', 'Şifre', '암호', 'Κωδικός'),
(68, 'save_branch_manager', 'Save Branch Manager', 'Guardar director de sucursal', '保存分公司经理', 'Save Branch Manager', 'Zapisz Kierownik Oddziału', 'Speichern Niederlassungsleiter', 'Sauvegarder Branch Manager', 'Salva di filiale', 'Сохранить Директор филиала', 'Salvar Gerente da Filial', 'Kaydet Şube Müdürü', '저장 지점장', 'Αποθήκευση Διευθυντής Υποκαταστήματος'),
(69, 'select_a_branch', 'Select A Branch', 'Seleccione una ramificación', '选择一个分支', 'Selecteer een Tak', 'Wybierz oddział', 'Wählen Sie eine Branche', 'Sélectionner une succursale', 'Seleziona una filiale', 'Выберите отрасль', 'Selecione Uma Filial', 'Bir Şube Seçiniz', '지점을 선택', 'Επιλέξτε ένα υποκατάστημα'),
(70, 'add_new_customer', 'Add New Customer', 'Añadir Nuevo Cliente', '添加新客户', 'Voeg Nieuwe klant', 'Dodaj Nowy klient', 'Fügen Sie ein neuer Kunde', 'Ajouter un nouveau client', 'Aggiungi nuovo cliente', 'Добавить нового клиента', 'Adicionar Novo cliente', 'Yeni Müşteri Ekle', '새로운 고객을 추가', 'Προσθήκη Νέος Πελάτης'),
(71, 'all_customeres', 'All Customeres', 'Todos customeres', '所有Customeres', 'Alle customeres', 'Wszystkie Customeres', 'Alle Customeres', 'Tous customeres', 'Tutti customeres', 'Все Customeres', 'Todos os customeres', 'Tüm customeres', '모든 고객사', 'Όλα τα Customeres'),
(72, 'customer_code', 'Customer Code', 'Código de Cliente', '客户代码', 'Customer Code', 'Kod klienta', 'Kundencode', 'Code client', 'Codice Cliente', 'Код клиента', 'Código do cliente', 'Müşteri Kodu', '고객 코드', 'Κωδικός Πελάτη'),
(73, 'customer_name', 'Customer Name', 'Nombre del cliente', '客户名称', 'Klantnaam', 'Nazwa klienta', 'Kundenname', 'Nom du client', 'Nome Cliente', 'Имя Клиента', 'Nome do cliente', 'Müşteri Adı', '고객 이름', 'Όνομα πελάτη'),
(74, 'customer_email', 'Customer Email', 'Cliente de correo electrónico', '客户电子邮件', 'Klantenservice E-mail', 'E-mail klienta', 'Kunden E-Mail-', 'Client Email', 'Clienti Email', 'Заказчик E-mail', 'Cliente Email', 'Müşteri E-', '고객 이메일', 'Πελάτης Email'),
(75, 'customer_password', 'Customer Password', 'Cliente Contraseña', '客户密码', 'Klant Password', 'Hasło klienta', 'Kunde Passwort', 'Client Mot de passe', 'Password dei clienti', 'Заказчик Пароль', 'Senha Cliente', 'Müşteri Şifre', '고객의 비밀', 'Πελάτης Κωδικού'),
(76, 'gender', 'Gender', 'Género', '性别', 'Geslacht', 'Płeć', 'Geschlecht', 'Sexe', 'Genere', 'Пол', 'Gênero', 'Cinsiyet', '성별', 'Γένος'),
(77, 'select_gender', 'Select Gender', 'Seleccione Género', '选择性别', 'Kies Geslacht', 'Wybierz Płeć', 'Wählen Sie Geschlecht', 'Sélectionnez Sexe', 'Selezionare Sesso', 'Выберите Пол', 'Selecionar Sexo', 'Cinsiyet Seç', '선택 성별', 'Επιλέξτε Φύλων'),
(78, 'male', 'Male', 'Masculino', '男', 'Mannelijk', 'Mężczyzna', 'Männlich', 'Mâle', 'Maschio', 'Мужчина', 'Masculino', 'Erkek', '남성', 'Αρσενικός'),
(79, 'female', 'Female', 'Femenino', '女', 'Vrouwelijk', 'Żeński', 'Weiblich', 'Femelle', 'Femminile', 'Женщина', 'Feminino', 'Kadın', '여성', 'Θήλυ'),
(80, 'customer_address', 'Customer Address', 'Dirección del cliente', '客户地址', 'Customer Address', 'Adres klienta', 'Kundenadresse', 'Adresse du client', 'Indirizzo clienti', 'Заказчик Адрес', 'Endereço do cliente', 'Müşteri Adresi', '고객 주소', 'Διεύθυνση Πελατών'),
(81, 'customer_phone_number', 'Customer Phone Number', 'Número de teléfono del cliente', '客服电话号码', 'Customer Telefoonnummer', 'Numer klienta Telefon', 'Kundentelefonnummer', 'Nombre clientèle de téléphone', 'Numero di telefono del cliente', 'Заказчик номер телефона', 'Número de telefone do cliente', 'Müşteri Telefon Numarası', '고객 전화 번호', 'Τηλέφωνο Πελατών'),
(82, 'save_customer', 'Save Customer', 'Guardar Cliente', '保存客户', 'Save Customer', 'Zapisz klienta', 'Save Kunden', 'Sauvegarder clientèle', 'Salva clienti', 'Сохранить клиентов', 'Salvar Cliente', 'Kaydet Müşteri', '저장 고객', 'Αποθήκευση Πελατών'),
(83, 'image', 'Image', 'Imagen', '图像', 'Afbeelding', 'Obraz', 'Bild', 'Image', 'Immagine', 'Изображение', 'Imagem', 'Görüntü', '영상', 'Εικόνα'),
(84, 'customer_image', 'Customer Image', 'Cliente de imagen', '客户图片', 'Customer Afbeelding', 'Obraz klienta', 'Kundenbild', 'Images client', 'Immagine cliente', 'Заказчик Изображение', 'Imagem cliente', 'Müşteri Görüntü', '고객 이미지', 'Εικόνα Πελατών'),
(85, 'basic_informations', 'Basic Information', 'Información Básica', '基本信息', 'Basis Informatie', 'Podstawowe Informacje', 'Allgemeines', 'Basic Informations', 'Informazioni Di Base', 'Основная Информация', 'Informação básica', 'Temel Bilgiler', '기본 정보', 'Βασικές Πληροφορίες'),
(86, 'order_history', 'Order History', 'Historial De Pedidos', '订单历史记录', 'Bestelgeschiedenis', 'Historia zamówień', 'Bestellverlauf', 'Historique des commandes', 'Cronologia Ordini', 'История заказов', 'Histórico de pedidos', 'Sipariş Geçmişi', '주문 내역', 'Ιστορικό παραγγελιών'),
(87, 'history', 'History', 'Historia', '历史', 'Geschiedenis', 'Historia', 'Geschichte', 'Histoire', 'Storia', 'История', 'História', 'Tarih', '역사', 'Ιστορία'),
(88, 'invoice_code', 'Invoice Code', 'Código Factura', '发票代码', 'Factuur Code', 'Kod faktury', 'Rechnungscode', 'Code de la facture', 'Codice Fattura', 'Счет код', 'Código factura', 'Fatura Kodu', '송장 번호', 'Τιμολόγιο Κωδικός'),
(89, 'payment_method', 'Payment Method', 'Forma de pago', '付款方式', 'Betalingsmethode', 'Metoda Płatności', 'Zahlungs-Methode', 'Mode de paiement', 'Metodo Di Pagamento', 'Способ Оплаты', 'Método de pagamento', 'Ödeme Şekli', '지불 방법', 'Τρόπος Πληρωμής'),
(90, 'amount', 'Amount', 'Cantidad', '量', 'Bedrag', 'Ilość', 'Höhe', 'Montant', 'Importo', 'Количество', 'Quantidade', 'Miktar', '양', 'Ποσό'),
(91, 'date', 'Date', 'Fecha', '日期', 'Datum', 'Data', 'Datum', 'Date', 'Data', 'Дата', 'Data', 'Tarih', '날짜', 'Ημερομηνία'),
(92, 'add_new_supplier', 'Add New Supplier', 'Añadir Nuevo Proveedor', '添加新的供应商', 'Voeg nieuwe leverancier', 'Dodaj nowego dostawcy', 'Neue Lieferanten', 'Ajouter un nouveau fournisseur', 'Aggiungi nuovo fornitore', 'Добавить новый поставщик', 'Adicionar Novo Fornecedor', 'Yeni Faaliyet Ekle', '새로운 공급자 추가', 'Προσθήκη νέου Προμηθευτής'),
(93, 'all_suppliers', 'All Suppliers', 'Todos los proveedores', '所有供应商', 'Alle leveranciers', 'Wszystkie Dostawcy', 'Alle Zulieferer', 'Tous les fournisseurs', 'Tutti i fornitori', 'Все Поставщики', 'Todos os Fornecedores', 'Tüm Tedarikçiler', '모든 공급 업체', 'Όλες οι Προμηθευτές'),
(94, 'company', 'Company', 'Empresa', '公司', 'Vennootschap', 'Spółka', 'Unternehmen', 'Société', 'Azienda', 'Компания', 'Companhia', 'Şirket', '회사', 'Εταιρεία'),
(95, 'company_name', 'Company Name', 'Nombre de compañía', '公司名称', 'Bedrijfsnaam', 'Nazwa Firmy', 'Name des Unternehmens', 'Nom de l\'entreprise', 'Nome Della Ditta', 'Название Компании', 'Nome da empresa', 'Firma Adı', '회사 명', 'Όνομα Εταιρίας'),
(96, 'supplier_company', 'Supplier Company', 'Anunciante empresa', '供应商公司', 'Aanbieder Firma', 'Nazwa firmy', 'Anbieter Firma', 'Fournisseur Société', 'Fornitore Società', 'Компания-поставщик', 'Fornecedor Empresa', 'Tedarikçi Firma', '공급 회사', 'Προμηθευτής Εταιρεία'),
(97, 'supplier_name', 'Supplier Name', 'Nombre del proveedor', '供应商名称', 'Naam Van Leverancier', 'Nazwa Dostawcy', 'Name des Anbieters', 'Nom Du Fournisseur', 'Nome Fornitore', 'Наименование Поставщика', 'Nome do fornecedor', 'Sağlayıcı Adı', '공급 업체 이름', 'Προμηθευτής Όνομα'),
(98, 'supplier_email', 'Supplier Email', 'Proveedor de correo electrónico', '电子邮件供应商', 'Leverancier Email', 'Dostawca E-mail', 'Lieferant Email', 'Fournisseur Email', 'Fornitore Email', 'Поставщик E-mail', 'Fornecedor Email', 'Tedarikçi Email', '공급 업체 이메일', 'Προμηθευτής Email'),
(99, 'supplier_image', 'Supplier Image', 'Imagen Proveedor', '供应商形象', 'Leverancier Afbeelding', 'Dostawca zdjęcie', 'Lieferant Bild', 'Fournisseur image', 'Fornitore Immagine', 'Поставщик изображения', 'Fornecedor Imagem', 'Tedarikçi Görüntü', '공급 업체 이미지', 'Προμηθευτής Εικόνα'),
(100, 'save_supplier', 'Save Supplier', 'Guardar Proveedor', '保存供应商', 'Save Leverancier', 'Zapisz Dostawca', 'Speichern Lieferant', 'Sauvegarder Fournisseur', 'Salva Fornitore', 'Сохранить Поставщик', 'Salvar Fornecedor', 'Kaydet alanı', '저장 공급', 'Αποθήκευση Προμηθευτής'),
(101, 'supplier_phone_number', 'Supplier Phone Number', 'Número de teléfono Proveedor', '供应商电话号码', 'Leverancier Telefoonnummer', 'Dostawca Numer telefonu', 'Lieferant Telefonnummer', 'Fournisseur numéro de téléphone', 'Fornitore Numero di telefono', 'Поставщик телефон', 'Número de telefone Fornecedor', 'Tedarikçi Telefon Numarası', '공급 업체 전화 번호', 'Προμηθευτής Αριθμός τηλεφώνου'),
(102, 'all_customers', 'All Customers', 'Todos los clientes', '所有客户', 'Alle klanten', 'Wszyscy Klienci', 'Alle Kunden,', 'Tous les clients', 'Tutti i clienti', 'Все Пользователи', 'Todos os clientes', 'Tüm Müşteriler', '모든 고객', 'Όλες οι Πελάτες'),
(103, 'from', 'From', 'Desde', '从', 'Van', 'Z', 'Von', 'À partir de', 'Da', 'От', 'De', 'Itibaren', '부터', 'Από'),
(104, 'add_new_product', 'Add New Product', 'Agregar nuevo producto', '添加新产品', 'Voeg Nieuw product', 'Dodaj nowy produkt', 'Neues Produkt hinzufügen', 'Ajouter un nouveau produit', 'Aggiungi nuovo prodotto', 'Добавить новый продукт', 'Adicionar Novo Produto', 'Yeni Ürün Ekle', '새 제품 추가', 'Προσθέστε Νέο Προϊόν'),
(105, 'all_products', 'All Products', 'Todos los productos', '所有产品', 'Alle producten', 'Wszystkie produkty', 'Alle Produkte', 'Tous les produits', 'Tutti i prodotti', 'Все продукты', 'Todos os produtos', 'Tüm Ürünler', '모든 제품', 'Όλα τα Προϊόντα'),
(106, 'serial', 'Serial', 'Serial', '串行', 'Serie-', 'Seryjny', 'Serien-', 'En série', 'Serial', 'Серийный', 'Serial', 'Seri', '일련의', 'Σειριακός'),
(107, 'purchase_price', 'Purchase Price', 'Precio de Compra', '购买价格', 'Aankoopprijs', 'Cena Zakupu', 'Kaufpreis', 'Prix ​​D\'Achat', 'Prezzo D\'Acquisto', 'Цена покупки', 'Preço de Compra', 'Alış fiyatı', '구매 가격', 'Τιμή Αγοράς'),
(108, 'selling_price', 'Selling Price', 'Precio De Venta', '售价', 'Verkoopprijs', 'Cena Sprzedaży', 'Verkaufspreis', 'Prix ​​De Vente', 'Prezzo Di Vendita', 'Цена Продажи', 'Preço de Venda', 'Satış Fiyatı', '판매 가격', 'Τιμή Πώλησης'),
(109, 'in_stock', 'In Stock', 'Disponible', '库存', 'Op Voorraad', 'Na Magazynie', 'Auf Lager', 'En Stock', 'Disponibile', 'В Наличии', 'Em Estoque', 'Stokta Var', '재고 있음', 'Σε Απόθεμα'),
(110, 'product_code', 'Product Code', 'Código del producto', '产品编号', 'Product Code', 'Kod produktu', 'Produktcode', 'Code du produit', 'Codice Prodotto', 'Код Продукта', 'Código do produto', 'Ürün Kodu', '제품 코드', 'Κωδικός Προϊόντος'),
(111, 'product_name', 'Product Name', 'Nombre del producto', '产品名称', 'Productnaam', 'Nazwa Produktu', 'Produktname', 'Nom du produit', 'Nome Del Prodotto', 'Наименование Товара', 'Nome do produto', 'Ürün Adı', '제품 이름', 'Όνομα Προϊόντος'),
(112, 'select_product_category', 'Select Product Category', 'Selecciona una categoría de producto', '选择产品类别', 'Selecteer Product Category', 'Wybierz kategorię produktów', 'Wählen Sie die Produktkategorie', 'Choisir une catégorie de produit', 'Seleziona una categoria di prodotto', 'Выберите категорию товаров', 'Selecione a categoria do produto', 'Ürün Kategorisi Seçiniz', '제품 선택 카테고리', 'Επιλέξτε Κατηγορία Προϊόντων'),
(113, 'product_purchase_price', 'Product Purchase Price', 'Producto Precio de Compra', '产品购买价格', 'Aankoopprijs', 'Zakup produktu Cena', 'Produktkaufpreis', 'Produit Prix d\'achat', 'Acquisto del prodotto Prezzo', 'Покупка товара Цена', 'Produto Preço de Compra', 'Ürün Satın Alma Fiyatı', '제품 구매 가격', 'Προϊόν Τιμή Αγοράς'),
(114, 'product_selling_price', 'Product Selling Price', 'Producto Precio de venta', '产品售价', 'Product verkoopprijs', 'Cena sprzedaży wyrobów', 'Produktverkaufspreis', 'Produit Prix de vente', 'Prodotto di vendita Prezzo', 'Продажа товара Цена', 'Produto Preço de Venda', 'Ürün Satış Fiyatı', '제품 판매 가격', 'Προϊόν Τιμή Πώλησης'),
(115, 'notes', 'Notes', 'Notas', '笔记', 'Notes', 'Uwagi', 'Aufzeichnungen', 'Remarques', 'Note', 'Примечания', 'Notas', 'Notlar', '노트', 'Σημειώσεις'),
(116, 'product_image', 'Product Image', 'Imagen del producto', '产品图片', 'Artikel afbeelding', 'Obraz produktu', 'Product Image', 'Image du produit', 'Product Image', 'Изображение', 'Imagem do Produto', 'Ürün Resmi', '제품 이미지', 'Φωτογραφία προϊόντος'),
(117, 'save_product', 'Save Product', 'Guardar producto', '保存产品', 'Product opslaan', 'Zapisz produkt', 'Produkt speichern', 'Enregistrer le produit', 'Salva prodotto', 'Сохранить товаров', 'Salvar Produto', 'Kaydet Ürün', '저장 제품', 'Αποθήκευση προϊόντων'),
(118, 'select_product_sub_category', 'Select Product Sub Category', 'Seleccionar producto Subcategoría', '选择产品子类别', 'Selecteer Sub Categorie', 'Sub Wybierz produkt Kategoria', 'Wählen Sie Produkt-Untergruppe', 'Sélectionner un produit Sous catégorie', 'Seleziona Sottocategoria Prodotto', 'Выберите продукт Подкатегория', 'Selecionar Produto Sub Categoria', 'Seçiniz Ürün Alt Kategorisi', '제품 선택 소분류', 'Επιλέξτε Προϊόν Υπο Κατηγορία'),
(119, 'product_barcode', 'Product Barcode', 'Código de barras del producto', '商品条码', 'Product streepjescode', 'Kod kreskowy produktu', 'Produkt-Barcode', 'Barcode produit', 'Barcode del prodotto', 'Штрих товаров', 'Código de barras do produto', 'Ürün Barkodu', '제품 바코드', 'Barcode του προϊόντος'),
(120, 'barcode', 'Barcode', 'Código de barras', '条码', 'Barcode', 'Barcode', 'Strichcode', 'Barcode', 'Barcode', 'Штрих', 'Barcode', 'Barkod', '바코드', 'Barcode'),
(121, 'product_category', 'Product Category', 'Categoría de producto', '产品类别', 'Product Categorie', 'Kategoria produktów', 'Produktkategorie', 'Catégorie de produits', 'Categoria Del Prodotto', 'Категория продукта', 'Categoria do produto', 'Ürün Kategorisi', '제품 카테고리', 'Κατηγορία προϊόντος'),
(122, 'add_new_product_category', 'Add New Product Category', 'Guardar Categoría Producto Nuevo', '添加新的产品类别', 'Add New Product Category', 'Dodaj nowy produkt Kategoria', 'Neue Produktkategorie', 'Ajouter une catégorie Nouveau produit', 'Aggiungi categoria Nuovo prodotto', 'Добавить категорию нового продукта', 'Adicionar nova categoria de produto', 'Yeni Ürün Kategorisi Ekle', '새로운 제품 카테고리를 추가', 'Προσθέστε Κατηγορία Νέων Προϊόντων'),
(123, 'all_product_categories', 'All Product Categories', 'Todas las Categorías de productos', '所有产品类别', 'All Product Categories', 'Wszystkie kategorie produktów', 'Alle Produktkategorien', 'Toutes les catégories de produits', 'Tutte le Categorie di prodotti', 'Все категории продуктов', 'Todas as categorias de produtos', 'Tüm Ürün Kategorileri', '모든 제품 카테고리', 'Όλες οι Κατηγορίες Προϊόντων'),
(124, 'add_new_category', 'Add New Category', 'Añadir Nueva Categoría', '添加新类别', 'Voeg Nieuwe categorie', 'Dodaj nową kategorię', 'Neue Kategorie hinzufügen', 'Ajouter une nouvelle catégorie', 'Aggiungi Nuova Categoria', 'Добавить новую категорию', 'Adicionar nova categoria', 'Yeni Kategori Ekle', '새로운 카테고리를 추가', 'Προσθήκη νέου Κατηγορία'),
(125, 'category_description', 'Category Description', 'Categoría Descripción', '类别说明', 'Categorie Beschrijving', 'Kategoria Opis', 'Kategorie Beschreibung', 'Catégorie Description', 'Categoria Descrizione', 'Категория Описание', 'Categoria Descrição', 'Kategori Açıklama', '범주 설명', 'Κατηγορία Περιγραφή'),
(126, 'save_category', 'Save Category', 'Guardar Categoría', '保存类别', 'Onthouden Categorie', 'Zapisz Kategoria', 'Speichern Sie Kategorie', 'Sauvegarder Catégorie', 'Salva Categoria', 'Сохранить Категория', 'Salvar Categoria', 'Kaydet Kategori', '저장 카테고리', 'Αποθήκευση Κατηγορία'),
(127, 'add_new_sub_category', 'Add New Sub Category', 'Añadir Nueva Subcategoría', '添加新的子类别', 'Voeg Nieuwe Sub Categorie', 'Dodaj nowy Podkategoria', 'Neue Unterkategorie', 'Ajouter un nouveau Sous catégorie', 'Aggiungi nuovo Sub Categoria', 'Добавить подкатегорию', 'Adicionar Novo Sub Categoria', 'Yeni Alt Kategori Ekle', '새 하위 카테고리를 추가', 'Προσθήκη νέου Υπο Κατηγορία'),
(128, 'sub_category_description', 'Sub Category Description', 'Sub Categoría Descripción', '子类别描述', 'Sub Categorie Beschrijving', 'Podkategoria Opis', 'Unterkategorie Beschreibung', 'Sous Catégorie Description', 'Sotto categoria Descrizione', 'Подкатегория Описание', 'Sub Categoria Descrição', 'Alt Kategori Açıklaması', '하위 카테고리 설명', 'Υπο Κατηγορία Περιγραφή'),
(129, 'save_sub_category', 'Save Sub Category', 'Guardar Subcategoría', '救子类别', 'Save Sub Categorie', 'Zapisz Podkategoria', 'Sparen Unterkategorie', 'Enregistrer Sous catégorie', 'Salva Sotto categoria', 'Сохранить подкатегорию', 'Salve Sub Categoria', 'Alt Kategori kaydet', '하위 카테고리를 저장', 'Αποθήκευση Υπο Κατηγορία'),
(130, 'add_damaged_product', 'Add Damaged Product', 'Añadir dañado Producto', '加入损坏的产品', 'Voeg beschadigde product', 'Dodaj uszkodzony produkt', 'Fügen Sie das Produkt beschädigt', 'Ajouter endommagé produit', 'Aggiungi Damaged prodotto', 'Добавить поврежденного продукта', 'Adicionar danificado Produto', 'Hasarlı Ürün Ekle', '손상된 제품 추가', 'Προσθήκη κατεστραμμένο προϊόν'),
(131, 'all_damaged_products', 'All Damaged Products', 'Todos los productos dañados', '所有损坏的产品', 'Alle Beschadigde producten', 'Wszystkie produkty uszkodzone', 'Alle Beschädigte Produkte', 'Tous les produits endommagés', 'Tutti i prodotti danneggiati', 'Все Поврежденные изделия', 'Todos os produtos danificados', 'Tüm Hasarlı Ürünler', '모든 손상된 제품', 'Όλα Κατεστραμμένα Προϊόντα'),
(132, 'quantity', 'Quantity', 'Cantidad', '数量', 'Hoeveelheid', 'Ilość', 'Menge', 'Quantité', 'Quantità', 'Количество', 'Quantidade', 'Miktar', '양', 'Ποσότητα'),
(133, 'select_product', 'Select Product', 'Seleccionar producto', '选择产品', 'Kies een product', 'Wybierz produkt', 'Produkt auswählen', 'Sélectionner un produit', 'Seleziona prodotto', 'Выберите продукт', 'Selecionar produto', 'Ürün Seçiniz', '제품 선택', 'Επιλέξτε Προϊόν'),
(134, 'damaged_quantity', 'Damaged Quantity', 'Cantidad dañado', '损坏的数量', 'Beschadigde Hoeveelheid', 'Uszkodzone Ilość', 'Beschädigte Menge', 'Endommagé Quantité', 'Danneggiato Quantità', 'Поврежденные Количество', 'Danificado Quantidade', 'Hasarlı Miktarı', '손상된 수량', 'Κατεστραμμένα Ποσότητα'),
(135, 'damaged_product_quantity', 'Damaged Product Quantity', 'Dañado Producto Cantidad', '损坏的产品数量', 'Beschadigde Product Hoeveelheid', 'Uszkodzone Produkt Ilość', 'Beschädigte Produkt Menge', 'Endommagé Produit Quantité', 'Danneggiato Quantità di prodotto', 'Поврежденные Количество товаров', 'Danificado Quantidade Produto', 'Hasarlı Ürün Miktarı', '손상된 제품 수량', 'Κατεστραμμένα Ποσότητα Προϊόν'),
(136, 'set_date', 'Set Date', 'Ajustar fecha', '设置日期', 'Set Date', 'Ustaw datę', 'Set Date', 'Régler la date', 'Imposta data', 'Установить дату', 'Definir data', 'Set Date', '날짜 설정', 'Ορισμός ημερομηνίας'),
(137, 'save_damaged_product', 'Save Damaged Product', 'Guardar dañado Producto', '保存损坏的产品', 'Sla beschadigde product', 'Zapisz uszkodzony produkt', 'Speichern Sie das Produkt beschädigt', 'Enregistrer endommagé produit', 'Salva Damaged prodotto', 'Сохранить поврежденный продукт', 'Salve danificado Produto', 'Hasarlı Ürün kaydet', '손상된 제품을 저장', 'Αποθήκευση κατεστραμμένο προϊόν'),
(138, 'read_messages', 'Read Messages', 'Leer mensajes', '阅读邮件', 'Berichten lezen', 'Czytaj Wiadomości', 'Lesen Sie Nachrichten', 'Lire Messages', 'Leggi messaggi', 'Читайте сообщения', 'Mensagens Lidas', 'Mesajlar Oku', '메시지 읽기', 'Διαβάστε Μηνύματα'),
(139, 'employee', 'Employee', 'Empleado', '雇员', 'Werknemer', 'Pracownik', 'Mitarbeiter', 'Employé', 'Dipendente', 'Сотрудник', 'Empregado', 'Işçi', '종업원', 'Υπάλληλος'),
(140, 'add_new_employee', 'Add New Employee', 'Añadir nuevo empleado', '添加新员工', 'Voeg Nieuwe Werknemer', 'Dodaj nowy pracownik', 'Neue Mitarbeiter', 'Ajouter des nouveaux employés', 'Aggiungi nuovo dipendente', 'Добавить нового сотрудника', 'Add New Employee', 'Yeni Çalışan Ekle', '신입 사원 추가', 'Προσθήκη νέου Υπάλληλος'),
(141, 'all_employees', 'All Employees', 'Todos Los Empleados', '所有员工', 'Alle medewerkers', 'Wszyscy pracownicy', 'Alle Mitarbeiter', 'Tous les employés', 'Tutti i dipendenti', 'Все сотрудники', 'Todos os funcionários', 'Tüm Çalışanlar', '모든 직원', 'Όλες οι εργαζόμενοι'),
(142, 'type', 'Type', 'Tipo', '类型', 'Type', 'Typ', 'Art', 'Type', 'Tipo', 'Тип', 'Tipo', 'Tip', '유형', 'Τύπος'),
(143, 'employee_name', 'Employee Name', 'Nombre Del Empleado', '员工姓名', 'Naam werknemer', 'Nazwa pracownik', 'Name des Mitarbeiters', 'Nom de l\'employé', 'Nome Dipendente', 'Имя Сотрудника', 'Nome do Funcionário', 'Çalışan Adı', '직원 이름', 'Όνομα Υπάλληλος'),
(144, 'employee_email', 'Employee Email', 'Empleado Correo', '员工电子邮件', 'Werknemer Email', 'Pracownik e-mail', 'Mitarbeiter per E-Mail', 'Employé Email', 'Dipendente Email', 'Сотрудник E-mail', 'Email empregado', 'Çalışan E-Posta', '직원 이메일', 'Υπάλληλος Email'),
(145, 'employee_password', 'Employee Password', 'Empleado contraseña', '员工密码', 'Werknemer Wachtwoord', 'Hasło pracownik', 'Mitarbeiter-Passwort', 'Employé Mot de passe', 'Dipendente password', 'Сотрудник Пароль', 'Empregado senha', 'Çalışan Şifre', '직원 암호', 'Υπάλληλος Κωδικού'),
(146, 'select_employee_type', 'Select Employee Type', 'Seleccione Tipo de empleo', '选择员工类型', 'Select Type werknemer', 'Wybierz Typ Zatrudnienia', 'Wählen Arbeitnehmertyp', 'Sélectionner le type de l\'employé', 'Seleziona Inquadramento', 'Выберите тип Сотрудник', 'Selecionar Tipo de Empregado', 'Seçin Çalışan Tipi', '선택 직원 유형', 'Επιλέξτε Σχέση απασχόλησης'),
(147, 'sales_staff', 'Sales Staff', 'Personal De Ventas', '销售人员', 'Sales Staff', 'Sales Staff', 'Vertriebsmitarbeiter', 'Le personnel de vente', 'Personale di vendita', 'Персонал по продажам', 'A equipe de vendas', 'Satış Ekibi', '판매 직원', 'Πωλήσεις Προσωπικό'),
(148, 'purchase_staff', 'Purchase Staff', 'Personal de Compra', '采购人员', 'Aankoop Staff', 'Zakup Staff', 'Kauf Staff', 'Personnel Achat', 'Staff Acquisto', 'Покупка персонал', 'Compra Pessoal', 'Satınalma Personel', '구매 직원', 'Αγορά Προσωπικό'),
(149, 'employee_phone_number', 'Employee Phone Number', 'Empleado Número de teléfono', '员工电话号码', 'Employee Telefoonnummer', 'Pracownik numer telefonu', 'Mitarbeiter-Telefonnummer', 'Employé numéro de téléphone', 'Dipendente Numero di telefono', 'Сотрудник номер телефона', 'Número de telefone empregado', 'Çalışan Telefon Numarası', '직원 전화 번호', 'Υπάλληλος Τηλέφωνο'),
(150, 'employee_address', 'Employee Address', 'Empleado Dirección', '员工地址', 'Werknemer Adres', 'Adres pracownik', 'Mitarbeiter-Adresse', 'Employé Adresse', 'Indirizzo dipendenti', 'Сотрудник Адрес', 'Endereço empregado', 'Çalışan Adresi', '직원 주소', 'Διεύθυνση Υπάλληλος'),
(151, 'employee_image', 'Employee Image', 'Empleado de imagen', '员工形象', 'Werknemer Afbeelding', 'Obraz pracownik', 'Mitarbeiter Bild', 'Employé image', 'Immagine dei dipendenti', 'Сотрудник изображения', 'Imagem empregado', 'Çalışan Görüntü', '직원 이미지', 'Εικόνα Υπάλληλος'),
(152, 'save_employee', 'Save Employee', 'Guardar Empleado', '保存员工', 'Save Employee', 'Zapisz Pracownika', 'Save Mitarbeiter', 'Sauvegarder employés', 'Salva dipendenti', 'Сохранить Сотрудник', 'Salvar Employee', 'Kaydet Çalışan', '저장 직원', 'Αποθήκευση Υπάλληλος'),
(153, 'informations', 'Information', 'Información', '信息', 'Informatie', 'Informacja', 'Information', 'Informations', 'Informazioni', 'Информация', 'Informações', 'Bilgi', '정보', 'Πληροφορίες'),
(154, 'messaging', 'Messaging', 'Mensajería', '消息', 'Messaging', 'Wiadomości', 'Messaging', 'Messagerie', 'Messaggistica', 'Обмен сообщениями', 'Mensagens', 'Mesajlaşma', '메시징', 'Μηνύματα'),
(155, 'compose_new_message', 'Compose New Message', 'Componer Mensaje Nuevo', '撰写新邮件', 'Componeren New Message', 'Skomponuj Nowa wiadomość', 'Compose New Message', 'Composer un nouveau message', 'Componi nuovo messaggio', 'Написать новое сообщение', 'Compor Nova Mensagem', 'Yeni Mesaj Oluştur', '새 메시지를 작성', 'Σύνταξη νέου μηνύματος'),
(156, 'please_select_a_message_to_read', 'Please Select A Message To Read', 'Seleccione un mensaje para leerlo', '请选择一个消息要阅读', 'Selecteer een bericht te lezen', 'Wybierz wiadomość do Czytaj', 'Bitte wählen Sie eine Email zu lesen', 'S\'il vous plaît Sélectionnez Un message pour le lire', 'Selezionare un messaggio per leggerlo', 'Выберите сообщение для прочитаны', 'Por favor escolha uma Mensagem Para Ler', 'Oku Kişiye Mesaj Seçiniz', '읽기에 메시지를 선택하세요', 'Επιλέξτε ένα μήνυμα να διαβάσει'),
(157, 'compose_message', 'Compose Message', 'Componer Mensaje', '撰写留言', 'Bericht componeren', 'Skomponuj wiadomość', 'Verfassen', 'Rédiger un message', 'Componi Messaggio', 'Написать сообщение', 'Componha Mensagem', 'Mesaj Oluştur', '메시지 작성', 'Σύνθεση μηνύματος'),
(158, 'compose_a_message', 'Compose A Message', 'Componer un Mensaje', '编写消息', 'Componeer een bericht', 'Tworzenie wiadomości', 'Verfassen Sie eine Nachricht', 'Composer un message', 'Comporre un messaggio', 'Написать сообщение', 'Compor uma Mensagem', 'Bir Mesaj Oluştur', '메시지 작성', 'Συνθέσετε ένα μήνυμα'),
(159, 'select_user', 'Select User', 'Seleccionar usuario', '选择用户', 'Gebruiker selecteren', 'Wybierz użytkownika', 'Wählen Sie Benutzer', 'Sélectionnez Utilisateur', 'Selezionare Utente', 'Выберите пользователя', 'Selecionar Usuário', 'Kullanıcı Seç', '사용자 선택', 'Επιλέξτε User'),
(160, 'send', 'Send', 'Enviar', '发送', 'Sturen', 'Wysłać', 'Senden', 'Envoyer', 'Inviare', 'Послать', 'Enviar', 'Göndermek', '보내기', 'Αποστολή'),
(161, 'messages', 'Messages', 'Mensajes', '消息', 'Berichten', 'Wiadomości', 'Nachrichten', 'Messages', 'Messaggi', 'Сообщения', 'Mensagens', 'Mesajlar', '메시지', 'Μηνύματα'),
(162, 'reply', 'Reply', 'Responder', '回复', 'Antwoorden', 'Odpowiadać', 'Antworten', 'Répondre', 'Risposta', 'Ответить', 'Responder', 'Cevap', '대답', 'Απάντηση'),
(163, 'manage_orders', 'Manage Orders', 'Gestionar pedidos', '管理订单', 'Beheer Bestellingen', 'Zarządzaj Zamówienia', 'Bestellungen verwalten', 'Gérer commandes', 'Gestisci ordini', 'Управление заказов', 'Gerencie Encomendas', 'Siparişleri yönetin', '주문 관리', 'Διαχείριση παραγγελιών'),
(164, 'pending', 'Pending', 'Pendiente', '有待', 'Hangende', 'W oczekiwaniu', 'Schwebend', 'En attendant', 'In attesa di', 'До', 'Pendente', 'Kadar', '보류', 'Εκκρεμής'),
(165, 'approved', 'Approved', 'Aprobado', '批准', 'Aangenomen', 'Zatwierdzony', 'Genehmigt', 'Approuvé', 'Approvato', 'Утвержденный', 'Aprovado', 'Onaylı', '승인', 'Εγκρίθηκε'),
(166, 'rejected', 'Rejected', 'Rechazado', '拒绝', 'Verworpen', 'Odrzucone', 'Abgelehnt', 'Rejeté', 'Rifiutato', 'Отклонено', 'Rejeitado', 'Reddedildi', '거부', 'Απορρίφθηκε'),
(167, 'settings', 'Settings', 'Ajustes', '设置', 'Instellingen', 'Ustawienia', 'Einstellungen', 'Paramètres', 'Impostazioni', 'Настройки', 'Definições', 'Ayarlar', '설정', 'Ρυθμίσεις'),
(168, 'language_settings', 'Language Settings', 'Opciones De Lenguaje', '语言设置', 'Taalinstellingen', 'Ustawienia Języka', 'Spracheinstellungen', 'Paramètres de langue', 'Impostazioni lingua', 'Языковые Настройки', 'Definições de idioma', 'Dil Ayarları', '언어 설정', 'Ρυθμίσεις Γλώσσα'),
(169, 'general_informations', 'General Information', 'Información General', '一般信息', 'Algemene Informatie', 'Informacje Ogólne', 'Allgemeine Informationen', 'General Informations', 'Informazioni Generali', 'Общая Информация', 'Informação Geral', 'Genel Bilgi', '일반 정보', 'Γενικές Πληροφορίες'),
(170, 'company_email', 'Company Email', 'Empresa Email', '企业邮箱', 'Bedrijf E-mail', 'Firma E-mail', 'Firma E-Mail', 'Société Email', 'Azienda Email', 'Компания E-mail', 'Companhia Email', 'Şirket E-', '회사 이메일', 'Εταιρεία Email'),
(171, 'currency', 'Currency', 'Moneda', '货币', 'Valuta', 'Waluta', 'Währung', 'Monnaie', 'Valuta', 'Валюта', 'Moeda', 'Para', '통화', 'Νόμισμα'),
(172, 'percentage', 'Percentage', 'Porcentaje', '百分比', 'Percentage', 'Odsetek', 'Prozentsatz', 'Pourcentage', 'Percentuale', 'Процент', 'Percentagem', 'Yüzde', '백분율', 'Ποσοστό'),
(173, 'select_language', 'Select Language', 'Seleccione Idioma', '选择语言', 'Selecteer Taal', 'Wybierz język', 'Select Language', 'Choisir La Langue', 'Seleziona La Lingua', 'Выберите язык', 'Selecione o idioma', 'Dil seçin', '언어 선택', 'Επιλέξτε Γλώσσα'),
(174, 'language', 'Language', 'Idioma', '语言', 'Taal', 'Język', 'Sprache', 'Langue', 'Lingua', 'Язык', 'Língua', 'Dil', '언어', 'Γλώσσα'),
(175, 'profile', 'Profile', 'Perfil', '轮廓', 'Profiel', 'Profil', 'Profil', 'Profil', 'Profilo', 'Профиль', 'Perfil', 'Profil', '윤곽', 'Προφίλ'),
(176, 'log_out', 'Log Out', 'Finalizar la sesión', '注销', 'Uitloggen', 'Wyloguj', 'Ausloggen', 'Se Déconnecter', 'Uscire', 'Выйти', 'Sair', 'Çıkış Yap', '로그 아웃', 'Αποσύνδεση'),
(177, 'click_to_collapse', 'Click To Collapse', 'Click para cerrar', '点击关闭', 'Klik op instorten', 'Kliknij, aby zwinąć', 'Klicken Sie zum Einsturz', 'Click to collapse', 'Clicca per collasso', 'Щелкните, чтобы свернуть', 'Clique para fechar', 'Aç İçin Tıklayınız', '축소하려면 클릭', 'Κάντε κλικ στην κατάρρευσή'),
(178, 'update_logo', 'Update Logo', 'Actualización Logo', '更新标志', 'Logo bijwerken', 'Aktualizacja Logo', 'Update Logo', 'Mise à jour Logo', 'Aggiornamento Logo', 'Обновление логотипа', 'Atualização Logo', 'Güncelleme Logo', '업데이트 로고', 'Ενημέρωση Logo'),
(179, 'current_logo', 'Current Logo', 'Logo actual', '目前的标志', 'Huidige Logo', 'Aktualny Logo', 'Aktuelle Logo', 'Logo actuel', 'Logo corrente', 'Текущий логотип', 'Logo atual', 'Güncel Logo', '현재 로고', 'Τρέχουσα Logo'),
(180, 'uplaod_new', 'Uplaod New', 'Uplaod Nuevo', 'Uplaod新', 'Uplaod New', 'Uplaod Nowy', 'Uplaod New', 'Uplaod New', 'Uplaod Nuovo', 'Uplaod Новый', 'Uplaod Nova', 'Uplaod Yeni', 'Uplaod 새로운', 'Uplaod Νέα'),
(181, 'system_logo', 'System Logo', 'Logo Sistema', '系统徽标', 'System Logo', 'System Logo', 'System Logo', 'Système Logo', 'Sistema Logo', 'Система Логотип', 'Logo Sistema', 'Sistem Logo', '시스템 로고', 'Σύστημα Λογότυπο'),
(182, 'manage_purchases', 'Manage Purchases', 'Administrar Compras', '采购管理', 'Beheer Aankopen', 'Zarządzaj Zakupy', 'Käufe verwalten', 'Gérer achats', 'Gestire Acquisti', 'Управление Закупки', 'Gerencie Compras', 'Satın yönetin', '구매 관리', 'Διαχειριστείτε Αγορές'),
(183, 'manage_sales', 'Manage Sales', 'Administrar Ventas', '销售管理', 'Beheer Sales', 'Zarządzaj sprzedaży', 'Verkäufe verwalten', 'Gérer ventes', 'Gestire le vendite', 'Управление продаж', 'Gerencie Vendas', 'Satış yönetin', '판매 관리', 'Διαχείριση Πωλήσεων'),
(184, 'new_sale', 'New Sale', 'Nueva venta', '新的销售', 'Nieuw Sale', 'Nowa Sprzedaż', 'New Sale', 'Nouveautés', 'Nuovo Vendita', 'Новое Распродажа', 'Novo Venda', 'Yeni Satış', '새로운 판매', 'Νέο Πώληση'),
(185, 'profile_settings', 'Profile Settings', 'Configuración del perfil', '配置文件设置', 'Profiel Instellingen', 'Ustawienia profilu', 'Profil-Einstellungen', 'Paramètres du profil', 'Impostazioni profilo', 'Настройки профиля', 'Configurações de perfil', 'Profil Ayarları', '프로필 설정', 'Ρυθμίσεις Προφίλ'),
(186, 'change_profile_picture', 'Change Profile Picture', 'Cambiar Foto De Perfil', '更改个人资料图片', 'Wijzig Profiel Foto', 'Zmień profil Obrazek', 'Ändern Profil Bild', 'Changer de profil Image', 'Cambia immagine profilo', 'Изменить картинку профиля', 'Alterar Imagem Perfil', 'Profil Resmi değiştir', '프로필 사진 변경', 'Αλλαγή εικόνας προφίλ'),
(187, 'your_name', 'Your Name', 'Su Nombre', '你的名字', 'Jouw Naam', 'Twoje Imię', 'Ihr Name', 'Votre Nom', 'Il Tuo Nome', 'Ваше Имя', 'Seu Nome', 'Adınız', '당신의 이름', 'Το Όνομα Σου'),
(188, 'your_email', 'Your Email', 'Tu Correo Electrónico', '您的电子邮件', 'Jouw Email', 'Twój Email', 'Ihre E-Mail', 'Ton E-Mail', 'La Tua Email', 'Ваш E-mail', 'Seu e-mail', 'E-Posta Adresiniz', '이메일', 'Το Ηλεκτρονικό Σου Ταχυδρομείο'),
(189, 'admin_image', 'Admin Image', 'Imagen de administración', '管理映像', 'Admin Afbeelding', 'Admin zdjęcie', 'Admin Bild-', 'Image admin', 'Immagine Admin', 'Админ изображения', 'Imagem de Admin', 'Yönetici Görüntü', '관리 이미지', 'Διαχειριστής Εικόνα'),
(190, 'change_password', 'Change Password', 'Cambiar contraseña', '更改密码', 'Verander Wachtwoord', 'Zmień Hasło', 'Kennwort ändern', 'Changer mot de passe', 'Cambiare La Password', 'Изменить Пароль', 'Change Password', 'Şifre Değiştir', '암호 변경', 'Άλλαξε Κωδικό'),
(191, 'current_password', 'Current Password', 'Contraseña Actual', '当前密码', 'Huidig ​​Wachtwoord', 'Aktualne Hasło', 'Aktuelles Passwort', 'Mot de passe actuel', 'Password Attuale', 'Текущий Пароль', 'Senha Atual', 'Mevcut Şifre', '현재 비밀번호', 'Τρέχουσα Κωδικός'),
(192, 'your_present_password', 'Your Present Password', 'Tu contraseña actual', '您现在的密码', 'Uw Present wachtwoord', 'Bieżące hasło', 'Ihre aktuelle Passwort', 'Votre mot de passe actuel', 'La password attuale', 'Ваш текущий пароль', 'Sua senha atual', 'Sizin Mevcut Şifre', '현재의 암호', 'Παρούσα τον κωδικό σας'),
(193, 'new_password', 'New Password', 'Nueva Contraseña', '新密码', 'Nieuw Wachtwoord', 'Nowe Hasło', 'Neues Passwort', 'Nouveau Mot De Passe', 'Nuova Password', 'Новый Пароль', 'Nova Senha', 'Yeni Şifre', '새 암호', 'Νέος Κωδικός'),
(194, 'your_new_password', 'Your New Password', 'Su nueva contraseña', '新密码', 'Uw nieuwe wachtwoord', 'Twoje nowe hasło', 'Ihr neues Passwort', 'Votre nouveau mot de passe', 'La tua nuova password', 'Ваш новый пароль', 'Sua nova senha', 'Sizin Yeni Şifre', '새 암호', 'Νέα κωδικού πρόσβασής σας'),
(195, 'confirm_new_password', 'Confirm New Password', 'Confirmar Nueva Contraseña', '确认新密码', 'Bevestig Nieuw Wachtwoord', 'Potwierdź Nowe Hasło', 'Neues Passwort bestätigen', 'Confirmer le nouveau mot de passe', 'Confermare Nuova Password', 'Подтвердите Новый Пароль', 'Confirmar nova senha', 'Yeni Şifreyi Onayla', '새 암호 확인', 'Επιβεβαίωση νέου κωδικού πρόσβασης'),
(196, 'password_mismatch', 'Password Mismatch', 'Contraseña No coinciden', '密码不匹配', 'Wachtwoord Mismatch', 'Hasło Niedopasowanie', 'Passwort-Fehlanpassung', 'Mot de passe Mismatch', 'Password non corrispondente', 'Пароль Несоответствие', 'Incompatibilidade de senha', 'Şifre Uyuşmazlığı', '암호 불일치', 'Κωδικός Ασυμφωνία'),
(197, 'new_purchsae', 'New Purchsae', 'Nueva Purchsae', '新Purchsae', 'Nieuwe Purchsae', 'Nowy Purchsae', 'New Purchsae', 'New Purchsae', 'Nuovo Purchsae', 'Новый Purchsae', 'Nova Purchsae', 'Yeni Purchsae', '새로운 Purchsae', 'Νέα Purchsae');
INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `spanish`, `chinese`, `dutch`, `polish`, `german`, `french`, `italian`, `russian`, `portugese`, `turkish`, `korean`, `greek`) VALUES
(198, 'purchase_code', 'Purchase Code', 'Código de Compra', '申购代码', 'Aankoop Code', 'Zakup Code', 'Purchase-Code', 'Code d\'Achat', 'Codice di acquisto', 'Покупка код', 'Código de compra', 'Satınalma Kodu', '구매 코드', 'Κωδικός Αγορά'),
(199, 'select_supplier', 'Select Supplier', 'Seleccionar proveedor', '选择供应商', 'Selecteer Leverancier', 'Wybierz Dostawca', 'Wählen Sie Lieferant', 'Sélectionnez fournisseur', 'Seleziona Fornitore', 'Выберите Поставщик', 'Escolha um Fornecedor', 'Seçin Tedarikçi', '선택 공급 업체', 'Επιλέξτε Προμηθευτή'),
(200, 'select_date', 'Select Date', 'Seleccionar fecha', '选择日期', 'Selecteer Datum', 'Wybierz Data', 'Datum wählen', 'Sélectionnez Date', 'Selezionare Data', 'Выберите Дата', 'Selecionar Data', 'Seç Tarihi', '날짜 선택', 'Επιλέξτε Ημερομηνία'),
(201, 'purchase_products', 'Purchase Products', 'Compra Productos', '购买产品', 'Aankoop producten', 'Zakupu produktów', 'Kaufen Produkte', 'Acheter des produits', 'Acquisto Prodotti', 'Заказ продукции', 'Produtos de compra', 'Satınalma Ürünleri', '구매 제품', 'Αγορά Προϊόντα'),
(202, 'unit_price', 'Unit Price', 'Precio Unitario', '单价', 'Prijs Unit', 'Cena Jednostkowa', 'Einzelpreis', 'Prix ​​Unitaire', 'Prezzo Unitario', 'Цена За Единицу', 'Preço Unitário', 'Birim Fiyat', '단위 가격', 'Τιμή Μονάδας'),
(203, 'total', 'Total', 'Total', '总', 'Totaal', 'Całkowity', 'Gesamt', 'Total', 'Totale', 'Общее', 'Total', 'Toplam', '합계', 'Σύνολο'),
(204, 'add_a_product', 'Add A Product', 'Añadir un Producto', '添加产品', 'Voeg een product', 'Dodaj produkt', 'Eine Artikel', 'Ajouter un produit', 'Aggiungere un prodotto', 'Добавить продукт', 'Adicionar um produto', 'Bir Ürün Ekle', '제품 추가', 'Προσθέτοντας ένα προϊόν'),
(205, 'payment', 'Payment', 'Pago', '付款', 'Betaling', 'Płatność', 'Bezahlung', 'Paiement', 'Pagamento', 'Оплата', 'Pagamento', 'Ödeme', '지불', 'Πληρωμή'),
(206, 'grand_total', 'Grand Total', 'Gran Total', '累计', 'Algemeen totaal', 'Suma całkowita', 'Gesamtsumme', 'Total', 'Totale', 'Общий Итог', 'Total geral', 'Genel Toplam', '총계', 'Συνολο'),
(207, 'method', 'Method', 'Método', '方法', 'Methode', 'Metoda', 'Verfahren', 'Méthode', 'Metodo', 'Метод', 'Método', 'Yöntem', '방법', 'Μέθοδος'),
(208, 'select_payment_method', 'Select Payment Method', 'Seleccione el método de pago', '请选择支付方式', 'Selecteer Payment Method', 'Wybierz metodę płatności', 'Wählen Sie die Zahlungsmethode', 'Sélectionnez la méthode de paiement', 'Seleziona metodo di pagamento', 'Выберите способ оплаты', 'Selecionar método de Pagamento', 'Seçin Ödeme Şekli', '선택 지불 방법', 'Επιλέξτε τρόπο πληρωμής'),
(209, 'cash', 'Cash', 'Efectivo', '现金', 'Geld', 'Gotówka', 'Bargeld', 'Espèces', 'Contanti', 'Наличные', 'Dinheiro', 'Nakit', '현금', 'Μετρητά'),
(210, 'check', 'Check', 'Comprobar', '检查', 'Controleer', 'Sprawdź', 'Scheck', 'Chèque', 'Controllare', 'Проверить', 'Verificar', 'Kontrol', '확인', 'Έλεγχος'),
(211, 'card', 'Card', 'Tarjeta', '卡', 'Kaart', 'Karta', 'Karte', 'Carte', 'Carta', 'Карта', 'Cartão', 'Kart', '카드', 'Κάρτα'),
(212, 'create_new_purchase', 'Create New Purchase', 'Crear nueva Compra', '创建新的采购', 'Nieuwe aankoop', 'Tworzenie nowego zakupu', 'Neues Kauf', 'Créer un nouveau Achat', 'Crea nuovo acquisto', 'Создать Покупка', 'Criar novo Compra', 'Yeni Alım Oluştur', '새로운 구매 만들기', 'Δημιουργία νέου Αγορά'),
(213, 'enter_payment_amount', 'Enter Payment Amount', 'Ingrese monto de pago', '输入支付金额', 'Voer Betaling Bedrag', 'Wprowadź Kwota płatności', 'Geben Sie Zahlungsbetrag', 'Entrez le montant du paiement', 'Inserisci Importo pagamento', 'Введите сумма оплаты', 'Digite o valor do pagamento', 'Ödeme Miktar giriniz', '지불 금액을 입력', 'Εισάγετε Ποσό Πληρωμής'),
(214, 'new_purchase_created', 'New Purchase Created', 'Nueva Compra Creado', '新购置的创建', 'Nieuwe aankoop Gemaakt', 'Zakup Utworzono nowy', 'New Purchase Erstellt', 'Nouvel achat Crée', 'Nuovo acquisto Creato', 'Новый Покупка Создано', 'Nova Compra Criado', 'Oluşturuldu Yeni Alım', '만든 새로운 구매', 'Νέα Αγορά Δημιουργήθηκε'),
(215, 'purchase_invoice', 'Purchase Invoice', 'Compra Factura', '采购发票', 'Purchase Invoice', 'Zakup Faktura', 'Kaufrechnung', 'Facture d\'achat', 'Acquisto Fattura', 'Покупка Счет', 'Compra Fatura', 'Satınalma Faturası', '구매 송장', 'Αγορά Τιμολόγιο'),
(216, 'to', 'To', 'A', '至', 'Naar', 'Do', 'Bis', 'À', 'A', 'В', 'Para', 'Için', '에', 'Να'),
(217, 'serial_no', 'Serial No', 'Número De Serie', '序列号', 'Serienummer', 'Numer Seryjny', 'Seriennummer', 'Numéro De Série', 'Numero Di Serie', 'Серийный Номер', 'Número de ordem', 'Seri Numarası', '일련 번호', 'Αύξων αριθμός'),
(218, 'total_amount', 'Total Amount', 'Cantidad Total', '总金额', 'Totaalbedrag', 'Całkowita ilość', 'Gesamtbetrag', 'Montant Total', 'Importo Totale', 'Итого', 'Valor Total', 'Toplam Tutar', '총액', 'Συνολικό Ποσό'),
(219, 'thank_you_for_your_business', 'Thank You For Your Business', 'Gracias Por Su Negocio', '谢谢您的业务', 'Dank u voor uw bedrijf', 'Dziękujemy Dla Twojej firmy', 'Vielen Dank, dass Sie für Ihr Unternehmen', 'Merci pour votre entreprise', 'Grazie Per Il Vostro Business', 'Спасибо для вашего бизнеса', 'Obrigado para o seu negócio', 'İşiniz İçin Teşekkür Ederim', '귀하의 비즈니스에 감사드립니다', 'Σας ευχαριστούμε για την επιχείρησή σας'),
(220, 'sale_invoice', 'Sale Invoice', 'Venta Factura', '销售发票', 'Verkoop Factuur', 'Faktura sprzedaży', 'Sale Rechnung', 'Vente facture', 'Vendita Fattura', 'Продажа Счет', 'Venda Fatura', 'Satış Faturası', '판매 송장', 'Τιμολογιο Πωλησης'),
(221, 'view_invoice', 'View Invoice', 'Ver Factura', '查看发票', 'Bekijk Factuur', 'Zobacz Faktura', 'Ansicht Rechnung', 'Voir Facture', 'Visualizza fattura', 'Посмотреть Счет', 'Ver Invoice', 'Görünüm Fatura', '보기 송장', 'Προβολή Τιμολόγιο'),
(222, 'view_purchase_invoice', 'View Purchase Invoice', 'Ver Compra Factura', '查看采购发票', 'Bekijk Purchase Invoice', 'Zobacz faktury zakupu', 'Ankaufsrechnung', 'Voir la facture d\'achat', 'Visualizza Acquisto Fattura', 'Посмотреть накладная', 'Ver nota fiscal de compra', 'Görünüm Satınalma Faturası', '보기 구매 송장', 'Προβολή Αγορά Τιμολόγιο'),
(223, 'order_code', 'Order Code', 'Código de pedido', '订购代码', 'Bestel Code', 'Kod zamówienia', 'Bestellcode', 'Code commande', 'Codice d\'ordine', 'Код заказа', 'Código de Encomenda', 'Sipariş Kodu', '주문 코드', 'Κωδικός Παραγγελίας'),
(224, 'select_customer', 'Select Customer', 'Seleccione Cliente', '选择客户', 'Selecteer Klant', 'Wybierz klienta', 'Wählen Kunden', 'Sélectionnez la clientèle', 'Selezionare clienti', 'Выберите клиента', 'Selecione Cliente', 'Seçin Müşteri', '선택 고객', 'Επιλογή Πελατών'),
(225, 'order_products', 'Order Products', 'Ordenar Productos', '订购产品', 'Bestel Producten', 'Zamówienie Produkty', 'Bestellen Produkte', 'Produits Tri', 'Ordinare Prodotti', 'Заказать продукты', 'Produtos Ordem', 'Sipariş Ürünleri', '제품 주문', 'Παραγγελία Προϊόντα'),
(226, 'other_informations', 'Other Informations', 'Otras Informaciones', '其它信息', 'Andere Informations', 'Inne Informacje', 'Weitere Informationen', 'Autres Informations', 'Altre Informazioni', 'Другие Информация', 'Outras Informações', 'Diğer Bilgiler', '기타 정보', 'Άλλες Πληροφορίες'),
(227, 'order_status', 'Order Status', 'Estado del pedido', '订单状态', 'Status van bestelling', 'Status Zamówienia', 'Status der Bestellung', 'Suivi de commande', 'Stato Dell\'ordine', 'Статус Заказа', 'Status do pedido', 'Sipariş Durumu', '주문 상태', 'Κατάσταση Παραγγελίας'),
(228, 'select_order_status', 'Select Order Status', 'Seleccione Estado del pedido', '选择订单状态', 'Selecteer Status van bestelling', 'Wybierz Stan zamówienia', 'Wählen Sie Status der Bestellung', 'Sélectionnez Statut de la commande', 'Seleziona Stato dell\'ordine', 'Выберите Статус заказа', 'Selecione Status do pedido', 'Sipariş Durumu Seçiniz', '주문 상태를 선택', 'Επιλέξτε Κατάσταση παραγγελίας'),
(229, 'payment_status', 'Payment Status', 'Estado De Pago', '付款状态', 'Betaling Status', 'Status Płatności', 'Payment Status', 'Statut De Paiement', 'Stato Del Pagamento', 'Статус Платежа', 'Situação do pagamento', 'Ödeme Durumu', '지불 상태', 'Κατάσταση Πληρωμής'),
(230, 'select_payment_status', 'Select Payment Status', 'Seleccione el estado del pedido', '选择付款状态', 'Selecteer Payment Status', 'Wybierz Płatność status', 'Select Payment Status', 'Sélectionnez Statut de paiement', 'Selezionare Stato Pagamento', 'Выберите Статус оплаты', 'Selecionar Situação do pagamento', 'Seçin Ödeme Durumu', '선택 지불 상태', 'Επιλέξτε Κατάσταση Πληρωμής'),
(231, 'unpaid', 'Unpaid', 'No pagado', '未付', 'Onbetaald', 'Niezapłacone', 'Unbezahlt', 'Non rémunéré', 'Non pagato', 'Неоплаченный', 'Não remunerado', 'Ödenmemiş', '지불하지 않은', 'Απλήρωτα'),
(232, 'paid', 'Paid', 'Pagado', '付费', 'Betaald', 'Płatny', 'Bezahlt', 'Payé', 'Pagato', 'Платный', 'Pago', 'Ücretli', '유료', 'Καταβάλλονται'),
(233, 'shipping_address', 'Shipping Address', 'Dirección de envío', '收件地址', 'Verzendadres', 'Adres Wysyłki', 'Verschiffen-Adresse', 'Adresse De Livraison', 'Indirizzo Di Spedizione', 'Адрес Доставки', 'Endereço para envio', 'Teslimat Adresi', '배송 주소', 'Διεύθυνση Αποστολής'),
(234, 'note', 'Note', 'Nota', '注意', 'Notitie', 'Uwaga', 'Note', 'Note', 'Note', 'Заметка', 'Nota', 'Not', '주의', 'Σημείωση'),
(235, 'notify_customer', 'Notify Customer', 'Notifique al Cliente', '通知客户', 'Houd Customer', 'Powiadomi Klienta', 'Benachrichtigen Kunden', 'Avertissez clientèle', 'Notifica clienti', 'Сообщите Заказчику', 'Notificar Cliente', 'Müşteri bildir', '고객에게 알림', 'Ειδοποίηση πελατών'),
(236, 'date_created', 'Date Created', 'Fecha de creación', '创建日期', 'Gemaakt op', 'Data utworzenia', 'Erstellungsdatum', 'Date Créée', 'Data di creazione', 'Дата создания', 'Data Criada', 'Oluşturulma Tarihi', '만든 날짜', 'Ημερομηνία δημιουργίας'),
(237, 'order_added_to_pending', 'Order Added To Pending', 'Orden de agregación a la pendiente', '为了增加未决', 'Bestel Added To afwachting', 'Zamówienie Dodano toczących', 'Zugegeben, um Pending', 'Afin Ajouté Pour attente', 'Ordine Inserito nel sospeso', 'Заказать Добавлено в состояние ожидания', 'Ordem Adicionado Para Pendente', 'Sipariş Beklemede Eklenenler', '주문 보류에 추가', 'Παραγγελία Προστέθηκε στις εκκρεμείς'),
(238, 'order_added_to_approved', 'Order Added To Approved', 'Solicitar Añadido Para Aprobado', '为了增加批准', 'Bestel Added To Goedgekeurd', 'Na zamówienie Dodano do Zatwierdzony', 'Sortieren Hinzugefügt genehmigt', 'Afin Ajouté à Approuvé', 'Ordine Inserito nel Approvato', 'Заказать Добавлено Утверждено', 'Ordem Adicionado Para Aprovado', 'Sipariş Onaylandı Eklenenler', '주문 승인에 추가', 'Παραγγελία Προστέθηκε στις εγκεκριμένες'),
(239, 'edit_order', 'Edit Order', 'Editar Orden', '编辑订单', 'Bewerken Bestel', 'Edycja Zamówienie', 'Bearbeiten Sortieren', 'Modifier la commande', 'Modifica Ordine', 'Редактировать Заказать', 'Editar a Ordem', 'Düzenleme Sipariş', '편집 주문', 'Επεξεργασία Παραγγελία'),
(240, 'ordered_products', 'Ordered Products', 'Productos pedidos', '订购产品', 'Bestelde producten', 'Zamówione produkty', 'Bestellte Produkte', 'Les produits commandés', 'Prodotti ordinati', 'Заказанные товары', 'Produtos encomendados', 'Sıralı Ürünler', '주문한 제품', 'Παραγγελθέντα προϊόντα'),
(241, 'status', 'Status', 'Estado', '状态', 'Toestand', 'Status', 'Status', 'Statut', 'Stato', 'Статус', 'Estado', 'Durum', '지위', 'Κατάσταση'),
(242, 'update_order', 'Update Order', 'Actualizar Orden', '更新订单', 'Bijwerken Bestel', 'Aktualizacja Zamówienie', 'Update Sortieren', 'Mise à jour Ordre', 'Aggiornamento Ordine', 'Обновление Заказать', 'Ordem de atualização', 'Güncelleme Sipariş', '업데이트 주문', 'Ενημέρωση Παραγγελία'),
(243, 'order_invoice', 'Order Invoice', 'Solicitar Factura', '订单发票', 'Bestel Factuur', 'Zamówienie faktury', 'Auftrag Rechnung', 'Commande Facture', 'Ordine Fattura', 'Заказать счета', 'Ordem Fatura', 'Sipariş Fatura', '주문 송장', 'Παραγγελία Τιμολόγιο'),
(244, 'order_number', 'Order Number', 'Número De Orden', '订单号', 'Bestelnummer', 'Numer Zamówienia', 'Bestellnummer', 'Numéro De Commande', 'Numero D\'Ordine', 'Номер Заказа', 'Número de Pedido', 'Sipariş Numarası', '주문 번호', 'Αριθμός Παραγγελίας'),
(245, 'select_product_by_barcode', 'Select Product By Barcode', 'Seleccionar un producto de código de barras', '选择产品通过条形码', 'Selecteer een product door de streepjescode', 'Wybierz produkt kodem kreskowym', 'Select Product By Barcode', 'Sélectionner un produit Par Barcode', 'Selezionare un prodotto Barcode', 'Выберите продукт по штрих-коду', 'Selecionar produto por código de barras', 'Barkod ile Ürün Seçiniz', '바코드으로 제품 선택', 'Επιλέξτε Προϊόν Με Barcode'),
(246, 'click_here_to_scan_barcode', 'Click Here To Scan Barcode', 'Haga clic aquí para Escanear código de barras', '点击这里进行扫描条码', 'Klik hier om de streepjescode scannen', 'Kliknij tutaj, aby skanowanie kodów kreskowych', 'Hier klicken, um Barcode-Scan', 'Cliquez ici pour Scannez Barcode', 'Clicca qui per scansione di codici a barre', 'Нажмите здесь, чтобы сканирования штрих-кода', 'Clique aqui para Digitalizar código de barras', 'Barkod Tarama için TIKLAYIN', '바코드를 스캔하려면 여기를 클릭하십시오', 'Κάντε κλικ εδώ για να σάρωση γραμμικού κώδικα'),
(247, 'select_product_by_category', 'Select Product By Category', 'Seleccionar producto Por categoría', '选择产品按类别', 'Selecteer een product door Categorie', 'Wybierz produkt Według kategorii', 'Select Product By Category', 'Sélectionner un produit Par catégorie', 'Seleziona prodotto Per categoria', 'Выберите продукт по категории', 'Selecionar produto Por categoria', 'By Category Ürün Seçiniz', '카테고리로 제품 선택', 'Επιλέξτε Προϊόν Με την κατηγορία'),
(248, 'select_a_category', 'Select A Category', 'Selecciona Una Categoría', '选择一个类别', 'Selecteer Een Categorie', 'Wybierz Kategorię', 'Wählen Sie eine Kategorie', 'Choisir Une Catégorie', 'Selezionare una categoria', 'Выберите Категорию', 'Selecione uma categoria', 'Bir Kategori Seç', '카테고리를 선택', 'Επιλέξτε μια κατηγορία'),
(249, 'select_products_to_sale', 'Select Products To Sale', 'Seleccione los productos a la venta', '选择产品要销售', 'Selecteer producten om Sale', 'Wybierz produkty do sprzedaży', 'Wählen Sie die Produkte bis zum Verkauf', 'Sélectionner les produits à la vente', 'Seleziona Prodotti Per Vendita', 'Выберите продукты продаже', 'Selecionar produtos Para Venda', 'Seçin Ürünler Satış için', '선택 제품 판매에', 'Επιλέξτε προϊόντα για να Sale'),
(250, 'select_sub_category', 'Select Sub Category', 'Seleccionar categoría Sub', '选择子类别', 'Selecteer Sub Categorie', 'Wybierz Podkategoria', 'Unterkategorie wählen', 'Sélectionnez Sous catégorie', 'Selezionare Sotto categoria', 'Выберите подкатегорию', 'Selecione Sub Categoria', 'Alt Kategori Seçiniz', '하위 카테고리를 선택', 'Επιλέξτε Υποκατηγορία'),
(251, 'sub_total', 'Sub Total', 'Sub Total', '小计', 'Sub Total', 'Sub Razem', 'Zwischensumme', 'Sous-total', 'Sub Total', 'Промежуточный итог', 'Subtotal', 'Alt Toplam', '소계', 'Μερικό σύνολο'),
(252, 'discount', 'Discount', 'Descuento', '折扣', 'Korting', 'Zniżka', 'Rabatt', 'Rabais', 'Sconto', 'Скидка', 'Desconto', 'Indirim', '할인', 'Έκπτωση'),
(253, 'discount_percentage', 'Discount Percentage', 'Porcentaje de descuento', '折扣百分比', 'Kortingspercentage', 'Rabat procentowy', 'Rabatt Prozent', 'Pourcentage de réduction', 'Percentuale di sconto', 'Скидка в процентах', 'Percentagem de Desconto', 'İndirim Oranı', '할인 비율', 'Έκπτωση Ποσοστό'),
(254, 'change', 'Change', 'Cambio', '变化', 'Verandering', 'Zmiana', 'Veränderung', 'Changement', 'Cambiamento', 'Изменение', 'Mudança', 'Değişiklik', '변화', 'Αλλαγή'),
(255, 'net_payment', 'Net Payment', 'El pago neto', '净支付', 'Net Betaling', 'Płatność netto', 'Nettozahlungs', 'Paiement net', 'Pagamento Net', 'Чистый платеж', 'Pagamento Net', 'Net Ödeme', '인터넷 결제', 'Καθαρή Πληρωμής'),
(256, 'view_sale_invoice', 'View Sale Invoice', 'Ver Venta Factura', '查看出售发票', 'Bekijk verkoopfactuur', 'Zobacz Faktura sprzedaży', 'Anzeigen Sale Rechnung', 'Voir Vente facture', 'Vendita fattura', 'Посмотреть продажа Счет', 'Ver Venda Fatura', 'Görünüm Satış Faturası', '보기 판매 송장', 'Δείτε Πώληση Τιμολόγιο'),
(257, 'language_selected', 'Language Selected', 'Idioma Seleccionado', '语言选择', 'Taal Geselecteerde', 'Język Wybrany', 'Sprache ausgewählt', 'Langue sélectionné', 'Lingua Selezionata', 'Язык Выбранный', 'Idioma seleccionado', 'Dil Seçilmiş', '언어 선택', 'Επιλεγμένη γλώσσα'),
(258, 'due', 'Due', 'Debido', '应有', 'Verschuldigd', 'Należny', 'Fällig', 'Dû', 'Dovuto', 'Должное', 'Devido', 'Due', '때문에', 'Λόγω'),
(259, 'take_payment', 'Take Payment', 'Tome Pago', '采取支付', 'Neem Betaling', 'Weź Płatność', 'Nehmen Sie Zahlung', 'Prenez paiement', 'Prendere pagamento', 'Возьмите Оплата', 'Tome Pagamento', 'Ödeme al', '지불을 가지고', 'Πάρτε Πληρωμής'),
(260, 'total_paid', 'Total Paid', 'Total pagado', '总付费', 'Totaal Betaald', 'Razem Płatny', 'Insgesamt gezahlt', 'Total Payé', 'Totale Pagato', 'Всего выплачено', 'Total Pago', 'Toplam Ödenen', '총 유료', 'Σύνολο επί πληρωμή'),
(261, 'amounts', 'Amounts', 'Cantidades', '量', 'Bedragen', 'Kwoty', 'Beträge', 'Montants', 'Importi', 'Суммы', 'Montantes', 'Tutarlar', '금액', 'Ποσά'),
(262, 'payment_taken', 'Payment Taken', 'Pago Tomada', '采取支付', 'Betaling Genomen', 'Płatność Zrobione', 'Zahlung genommen', 'Prise paiement', 'Pagamento Taken', 'Оплата Взятые', 'Pagamento Tomado', 'Ödeme Taken', '결제 촬영', 'Πληρωμή Taken'),
(263, 'sale_added', 'Sale Added', 'Venta Alta', '上架销售', 'Sale Toegevoegd', 'Sprzedaż Dodano', 'Sale Hinzugefügt', 'Vente Ajouté', 'Sale Aggiunto', 'Продажа Добавлен', 'Venda Adicionado', 'Satış eklendi', '판매는 추가', 'Πώληση Καταχώρησης'),
(264, 'payment_history', 'Payment History', 'Historial de pagos', '付款记录', 'Betaling Geschiedenis', 'Historia płatności', 'Zahlungsprotokoll', 'Historique des paiements', 'Cronologia pagamenti', 'История платежей', 'Histórico de pagamentos', 'Ödeme Geçmişi', '지급 내역', 'Ιστορικό πληρωμών'),
(265, 'number_of_payments', 'Number Of Payments', 'Número de pagos', '国际收支数', 'Aantal betalingen', 'Liczba płatności', 'Anzahl der Zahlungen', 'Nombre de paiements', 'Numero di pagamenti', 'Количество платежей', 'Número de pagamentos', 'Ödemeler Sayısı', '지불의 수', 'Αριθμός των πληρωμών'),
(266, 'payments', 'Payments', 'Pagos', '付款', 'Betalingen', 'Płatności', 'Zahlungen', 'Paiements', 'Pagamenti', 'Платежи', 'Pagamentos', 'Ödemeler', '지불', 'Πληρωμές'),
(267, 'customer_discount_percentage', 'Customer Discount Percentage', 'Descuento Cliente Porcentaje', '客户的折扣百分比', 'Customer Discount Percentage', 'Odsetek klientów rabatem', 'Kundenrabatt Prozentualer', 'Client pourcentage de remise', 'Sconto cliente Percentuale', 'Скидка клиента в процентах', 'Discount cliente Percentagem', 'Müşteri İndirim Oranı', '고객 할인 비율', 'Πελάτης ποσοστό έκπτωσης'),
(268, 'last_modified', 'Last Modified', 'Última Modificación', '最后修改', 'Laatst gewijzigd', 'Ostatnio Zmodyfikowany', 'Zuletzt geändert', 'Dernière mise à jour', 'Ultima Modifica', 'Последнее изменение', 'Última Modificação', 'Son Güncelleme', '마지막으로 수정', 'Τελευταία τροποποίηση'),
(269, 'change_status', 'Change Status', 'Cambiar estado', '更改状态', 'Status wijzigen', 'Zmiana stanu', 'Status ändern', 'Changer le statut', 'Modifica stato', 'Изменение статуса', 'Alterar estado', 'Değişim Durumu', '상태 변경', 'Αλλαγή Κατάσταση'),
(270, 'total_amount_paid', 'Total Amount Paid', 'Monto total pagado', '数量来支付', 'Totaal bedrag betaald', 'Całkowita kwota wypłacona', 'Gesamtbetrag bezahlt', 'Montant total payé', 'Importo totale versato', 'Общая сумма, выплачиваемая', 'Montante total pago', 'Ödenen Toplam Tutar', '지불 총액', 'Συνολικό ποσό που καταβλήθηκε'),
(271, 'all_orders', 'All Orders', 'Madre', '所有订单', 'Alle bestellingen', 'Wszystkie Zlecenia', 'Alle Bestellungen', 'Toutes les commandes', 'Tutti gli ordini', 'Все заказы', 'Em todo o Brasil', 'Tüm Siparişler', '모든 주문', 'Όλες οι Παραγγελίες'),
(272, 'total_customers', 'Total Customers', 'Los clientes totales', '客户总数', 'Totaal Klanten', 'Wszystkich Klientów', 'Insgesamt Kunden', 'Nombre de clients', 'Totale Clienti', 'Всего Клиенты', 'Total de Clientes', 'Toplam Müşteriler', '전체 고객', 'Σύνολο Πελάτες'),
(273, 'view_customer_list', 'View Customer List', 'Ver Lista de clientes', '查看客户名单', 'Bekijk Klant Lijst', 'Widok listy klienta', 'Bild Kundenliste', 'Voir la liste à la clientèle', 'Visualizza Elenco clienti', 'Показать список клиентов', 'Ver Lista de Clientes', 'Görünüm Müşteri Listesi', '보기 고객 목록', 'Προβολή Λίστας Πελατών'),
(274, 'view_all_orders', 'View All Orders', 'Ver todas las Órdenes', '查看所有订单', 'Bekijk alle producten', 'Zobacz wszystkie rozkazy', 'Alle Bestellungen', 'Voir tous les ordres', 'Visualizza tutti gli ordini', 'Все заказы', 'Ver em todo o Brasil', 'Tüm siparişler görüntüle', '모든 주문보기', 'Προβολή όλων των παραγγελιών'),
(275, 'total_income_amount', 'Total Income Amount', 'Monto Total de Ingresos', '收入总额', 'Totaal Inkomen Bedrag', 'Całkowita ilość dochodowy', 'Gesamteinkommen Betrag', 'Montant total du revenu', 'Totale proventi Importo', 'Общая сумма доходов', 'Quantia de renda total', 'Toplam Gelirler Tutar', '총 소득 금액', 'Συνολικό Ποσό εισοδήματος'),
(276, 'view_sale_invoices', 'View Sale Invoices', 'Ver Venta Facturas', '查看出售发票', 'Bekijk Sale Facturen', 'Faktury sprzedaży', 'Ansicht Verkauf Rechnungen', 'Voir factures de vente', 'Vendita fatture', 'Посмотреть продажа Счета', 'Facturas de venda em', 'Görünüm Satış Faturaları', '보기 판매 송장', 'Δείτε Πώληση Τιμολόγια'),
(277, 'total_purchase_amount', 'Total Purchase Amount', 'Monto total de compra', '累计买入金额', 'Totale aankoopbedrag', 'Zakup Kwota całkowita', 'Gesamtkaufbetrag', 'Total Montant de l\'achat', 'Importo totale di acquisto', 'Всего суммы покупки', 'Valor total da compra', 'Toplam Satınalma Tutar', '총 구매 금액', 'Συνολικό Ποσό Αγορά'),
(278, 'view_purchase_history', 'View Purchase History', 'Ver Historial de compras', '查看购买记录', 'Bekijk Aankoop Geschiedenis', 'Zobacz Historia zakupów', 'Kauf-Historie anzeigen', 'Voir Historique des achats', 'Visualizza Cronologia acquisti', 'Посмотреть История покупок', 'Ver Histórico de compras', 'Görünüm Satınalma Geçmişi', '보기 구매 내역', 'Προβολή του Ιστορικού αγορών'),
(279, 'customer_payments_report', 'Customer Payments Report', 'Los pagos de clientes Reportar', '客户付款报告', 'Customer Payments Report', 'Płatności klientów Zgłoś', 'Kunden Payments Report', 'les paiements des clients Rapport', 'Pagamenti Relazione Clienti', 'Платежи клиентов Пожаловаться', 'Os pagamentos de clientes Comunicar', 'Müşteri Ödemeleri Raporu', '고객 지불 보고서', 'Έκθεση πληρωμές πελατών'),
(280, 'last_30_days', 'Last 30 Days', 'Últimos 30 Días', '最后30天', 'Laatste 30 dagen', 'Ostatnie 30 dni', 'Letzten 30 Tage', '30 derniers jours', 'Ultimi 30 giorni', 'Последние 30 дней', 'Últimos 30 dias', 'Son 30 Gün', '지난 30 일', 'Τελευταίες 30 Ημέρες'),
(281, 'customer_payments', 'Customer Payments', 'Los pagos de los clientes', '客户付款', 'Customer Payments', 'Płatności klientów', 'Kundenzahlungen', 'les paiements des clients', 'I pagamenti dei clienti', 'Платежи клиентов', 'Os pagamentos de clientes', 'Müşteri Ödemeleri', '고객의 지불', 'Πληρωμές Πελατών'),
(282, 'income_expense', 'Income Expense', 'Gastos Ingresos', '收入支出', 'Inkomsten Expense', 'Koszty dochodowy', 'Income Expense', 'Charges Produits', 'Proventi Oneri', 'Прибыль', 'Despesa Renda', 'Gelir Gider', '소득 비용', 'Έξοδα Έσοδα'),
(283, 'products_in_stock', 'Products In Stock', 'Productos en Stock', '产品库存', 'Producten in voorraad', 'Produkty w magazynie', 'Auf Lager', 'Produits en stock', 'Prodotti in magazzino', 'Продукты на складе', 'Os produtos em stock', 'Depoda Ürünler', '재고 제품', 'Προϊόντα Σε Απόθεμα'),
(284, 'reports', 'Reports', 'Informes', '报告', 'Rapporten', 'Raporty', 'Berichte', 'Rapports', 'Rapporti', 'Отчеты', 'Relatórios', 'Raporlar', '보고서', 'Εκθέσεις'),
(285, 'report_of', 'Report Of', 'Informe de', '报告', 'Verslag van', 'SPRAWOZDANIE', 'Bericht des', 'Rapport du', 'Rapporto Di', 'Доклад', 'Relatório do', 'Sunumu', '의 보고서', 'Έκθεση'),
(286, 'select_date_range', 'Select Date Range', 'Seleccione Intervalo de fechas', '选择日期范围', 'Select Date Range', 'Wybierz zakres dat', 'Select Date Range', 'Sélectionnez Date Range', 'Selezionare Intervallo date', 'Выберите диапазон дат', 'Escolha um intervalo de datas', 'Seçin Tarih Aralığı', '선택 날짜 범위', 'Επιλέξτε Χρονικό Διάστημα'),
(287, 'date_range', 'Date Range', 'Intervalo de fechas', '日期范围', 'Datumbereik', 'Zakres dat', 'Date Range', 'Date de Gamme', 'Intervallo date', 'Диапазон дат', 'Data Faixa', 'Tarih Aralığı', '날짜 범위', 'Χρονικό Διάστημα'),
(288, 'go', 'Go', 'Ir', '去', 'Gaan', 'Iść', 'Gehen', 'Aller', 'Andare', 'Идти', 'Ir', 'Gitmek', '가기', 'Πηγαίνω'),
(289, 'report', 'Report', 'Informe', '报告', 'Rapport', 'Raport', 'Bericht', 'Rapport', 'Rapporto', 'Отчет', 'Relatório', 'Rapor', '보고서', 'Έκθεση'),
(290, 'income', 'Income', 'Ingresos', '收入', 'Inkomen', 'Dochód', 'Einkommen', 'Revenu', 'Reddito', 'Доход', 'Renda', 'Gelir', '수입', 'Εισόδημα'),
(291, 'expense', 'Expense', 'Gasto', '费用', 'Kosten', 'Koszt', 'Ausgabe', 'Frais', 'Spesa', 'Расходы', 'Despesa', 'Gider', '비용', 'Δαπάνη'),
(292, 'browse_products', 'Browse Products', 'Buscar más productos', '浏览产品', 'Blader Producten', 'Przeglądaj produkty', 'Browse Products', 'Parcourir les produits', 'Guarda i prodotti', 'Обзор продуктов', 'Procurar produtos', 'Araştır Ürünleri', '제품 찾아보기', 'Αναζήτηση Προϊόντων'),
(293, 'create_a_new_order', 'Create A New Order', 'Crear un nuevo orden', '创建新订单', 'Maak een New Order', 'Tworzenie nowego porządku', 'Erstellen Sie eine neue Bestellung', 'Créer un nouvel ordre', 'Creare un nuovo ordine', 'Создать новый заказ', 'Criar uma nova ordem', 'Yeni Sipariş Oluştur', '뉴 오더 생성', 'Δημιουργήστε μια νέα παραγγελία'),
(294, 'create_a_new_sale', 'Create A New Sale', 'Crear una nueva venta', '创建一个新的销售', 'Maak een nieuwe Sale', 'Utwórz nowy Sprzedaż', 'Ein neues Sale', 'Créer une nouvelle vente', 'Crea una nuova vendita', 'Создать новый Продажа', 'Criar uma nova venda', 'Yeni Sale Oluştur', '새로운 판매 만들기', 'Δημιουργήστε ένα νέο Πώληση'),
(295, 'add_a_new_purchase', 'Add A New Purchase', 'Añadir una nueva compra', '添加一个新的购买', 'Voeg een nieuwe aankoop', 'Dodaj zakupu nowego', 'Fügen Sie einen neuen Kauf', 'Ajouter un nouvel achat', 'Aggiungi un nuovo acquisto', 'Добавить новую покупку', 'Adicionar uma nova compra', 'Yeni Satın Alma ekle', '새로운 구매 추가', 'Προσθέστε μια νέα αγορά'),
(296, 'order_added_to_rejected', 'Order Added To Rejected', 'Solicitar Añadido Para Rechazado', '为了增加要被拒绝', 'Bestel Added To Afgewezen', 'Na zamówienie Dodano do Odrzucone', 'Sortieren Hinzugefügt abgelehnt', 'Afin Ajouté à Rejeté', 'Ordine Inserito nel Rifiutato', 'Заказать Добавлено отказанному', 'Ordem Adicionado Para Rejeitado', 'Sipariş Reddedildi Eklenenler', '주문 거부에 추가', 'Παραγγελία Προστέθηκε Για Απορρίφθηκε'),
(297, 'message_sent', 'Message Sent', 'Mensaje Enviado', '发送消息', 'Bericht Verzonden', 'Wiadomość wysłana', 'Nachricht wurde gesendet', 'Message Envoyé', 'Messaggio Inviato', 'Сообщение Отправлено', 'Mensagem Enviada', 'Mesaj Gönderildi', '메시지 전송', 'Μήνυμα εστάλη'),
(298, 'decrease_from_stock', 'Decrease From Stock', 'Disminución De Stock', '减少库存', 'Verlaag Van Stock', 'Zmniejsz Od magazynie', 'Verringern Sie ab Lager', 'Diminuer De Stock', 'Diminuire Da Archivio', 'Уменьшить на складе', 'Diminuir A partir da', 'Stokta Gönderen azaltın', '재고 감소', 'Μείωση από το Χρηματιστήριο'),
(299, 'yes', 'Yes', 'sí', '是的', 'ja', 'tak', 'ja', 'oui', 'sì', 'да', 'sim', 'evet', '예', 'ναί'),
(300, 'no', 'No', 'no', '没有', 'geen', 'nie', 'keine', 'aucun', 'no', 'нет', 'nenhuma', 'hayır', '아니', 'όχι'),
(301, 'tax_settings', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(302, 'add_tax', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(303, 'taxes', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(304, 'tax_code', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(305, 'tax_name', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(306, 'tax_percentage', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(307, 'save_tax_settings', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(308, 'tax_settings_added', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(309, 'update_tax_settings', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(310, 'tax_settings_updated', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(311, 'tax_deleted', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(312, 'select_a_tax', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(313, 'none', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(314, 'tax', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `message_body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

DROP TABLE IF EXISTS `message_thread`;
CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `receiver` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vat_percentage` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount_percentage` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sub_total` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grand_total` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creating_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `modifying_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'income expense',
  `method` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paypal cash cheque card',
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `serial_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `selling_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'company_name', 'Bizpro'),
(3, 'address', 'Canada'),
(4, 'phone', '12345566'),
(5, 'company_email', 'admin@bizpro.com'),
(6, 'currency', '$'),
(8, 'discount_percentage', ''),
(9, 'language', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE `tax` (
  `tax_id` int(11) NOT NULL,
  `tax_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` double NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `damaged_product`
--
ALTER TABLE `damaged_product`
  ADD PRIMARY KEY (`damaged_product_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `damaged_product`
--
ALTER TABLE `damaged_product`
  MODIFY `damaged_product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
