# PROMPT LOG

## Prompt 1

**Prompt:**

> make a laravel project

**What I produced:**
Fresh Laravel 12.12.2 project (latest compatible with the machine's PHP 8.2; v13 requires PHP ^8.3) in `C:\xampp\htdocs\portfolio`, with app key generated, SQLite database created, and default migrations run.

**What I did with it:**

---

## Prompt 2

**Prompt:**

> Create a Laravel portfolio project (MVC: routes, PortfolioController, Blade views, Tailwind via Vite). Init git.
>
> Style reference: https://themewagon.github.io/author/ (keep dark header, hero layout, about layout skip shop/blog/testimonials).
>
> Photo: copy C:\xampp\htdocs\portfolio\profile.jpeg to public/images/.
>
> Build:
>  Hero: Rex Decuan Luceño Jr. , IT Student , "Innovate. Create. Elevate."
>  About: "4th year IT student aiming to build a successful career in tech and provide a good life for my family. Passionate about coding, networking, and hardware."
>
> Commit separately: setup, hero, about.

**What I produced:**
- `npm install` (Tailwind 4 + Vite, already configured in the Laravel scaffold)
- Copied `profile.jpeg` to `public/images/profile.jpeg`
- `resources/views/layouts/app.blade.php` — dark header/nav + minimal footer
- `app/Http/Controllers/PortfolioController.php` with `index()`
- `GET /` route wired to `PortfolioController@index`
- Removed default `welcome.blade.php`
- `resources/views/portfolio/index.blade.php` — hero (name, IT Student, "Innovate. Create. Elevate.", photo) and about (photo + bio)
- `git init` and three commits: `setup`, `hero`, `about`

**What I did with it:**

---

## Prompt 3

**Prompt:**

> Add to the same project, matching template style:
>
> Education: BS Information Technology, Data Center College of the Philippines - Bangued, Abra. Also: Abra High School - Main Campus, 2017.
>
> Skills: Coding, Network Configuration, Hardware Deployment.
> Certifications: TESDA CSS/NC2 - September 2025.
>
> Fun fact counters (repurpose template's 4-counter section): Projects Completed, Years Coding, Certifications Earned, Technologies Used — placeholder numbers, comment for later edit.
>
> Contact: lucenorexjr.913@gmail.com | 0938-780-2526 | github.com/rexdlucenojr. Add contact form (name, email, message) with validation.
>
> Commit each section separately.

**What I produced:**
Five commits, each adding one section to `resources/views/portfolio/index.blade.php`:
- `education` — BS IT (Data Center College of the Philippines, Bangued, Abra) + Abra High School Main Campus (2017)
- `skills` — Coding, Network Configuration, Hardware Deployment
- `certifications` — TESDA CSS/NC2, September 2025
- `counters` — four placeholder stat counters with a `{{-- TODO --}}` comment for later edit
- `contact` — email/phone/GitHub info cards + dark contact form; `app/Http/Controllers/ContactController.php` with `POST /contact` and server-side validation (required name/email/message, email format) + success flash message
- Nav links for each section added incrementally in their commits

**What I did with it:**