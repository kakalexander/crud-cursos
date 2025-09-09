# Sistema de Gestão de Alunos e Cursos
Antes de começar, certifique-se de ter instalado:

- **PHP 8.2 ou superior**
- **Composer** (gerenciador de dependências PHP)
- **Node.js 18+ e npm** (para assets frontend)
- **SQLite** (banco de dados padrão) ou MySQL/PostgreSQL

### Verificando as versões:

```bash
php --version
composer --version
node --version
npm --version
```

## 🚀 Instalação

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd projetohj
```

### 2. Instale as dependências PHP

```bash
composer install
```

### 3. Instale as dependências Node.js

```bash
npm install
```

### 4. Configure o ambiente

Crie o arquivo `.env` baseado no `.env.example`:

```bash
cp .env.example .env
```

Se não existir o `.env.example`, crie um arquivo `.env` com o seguinte conteúdo:

```env
APP_NAME="Sistema de Gestão"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost:8000

APP_LOCALE=pt_BR
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=pt_BR

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

### 5. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 6. Configure o banco de dados

O projeto está configurado para usar SQLite por padrão. O arquivo `database/database.sqlite` já existe.

Se preferir usar MySQL ou PostgreSQL, edite o arquivo `.env`:

**Para MySQL:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

**Para PostgreSQL:**
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 7. Execute as migrações

```bash
php artisan migrate
```

Para executar o projeto:

```bash
php artisan serve

```
O sistema possui as seguintes tabelas:

### `area_cursos`
- `id` (Primary Key)
- `titulo` (String)
- `descricao` (Text, nullable)
- `created_at`, `updated_at` (Timestamps)

### `alunos`
- `id` (Primary Key)
- `nome` (String)
- `email` (String, unique)
- `data_nascimento` (Date, nullable)
- `created_at`, `updated_at` (Timestamps)

### `matriculas`
- `id` (Primary Key)
- `aluno_id` (Foreign Key -> alunos.id)
- `area_curso_id` (Foreign Key -> area_cursos.id)
- `created_at`, `updated_at` (Timestamps)
- Constraint única: `aluno_id` + `area_curso_id`


**Desenvolvido com ❤️ usando Laravel**