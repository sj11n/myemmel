# myemmel.com

WordPress-Block-Theme für www.myemmel.com (Björn Emmerling).
Design und Texte sind final: `design/index.html`, `content/copy.md`.

## Aufbau

- `wp-content/themes/myemmel/` – das Theme (einziger Teil, der deployt wird)
- `design/`, `assets/`, `content/`, `legal/` – Referenz, wird nie deployt
- `.github/workflows/deploy.yml` – Deployment per SFTP bei Push auf `main`

WordPress-Kern, Plugins und Datenbank bleiben bei STRATO.

## Hosting (STRATO)

- WordPress: `STRATO-apps/wordpress_03/app`
- Theme-Ziel: `STRATO-apps/wordpress_03/app/wp-content/themes/myemmel`
- Datenbank: MariaDB 10.11
- Kein Staging: Deployment geht direkt auf die Live-Seite, die bis zum Go-Live hinter einer Coming-Soon-Seite liegt.

## Einmalig einrichten (Björn)

1. STRATO-Login → Datenbanken und Webspace → SFTP & SSH → SFTP-Zugang anlegen.
2. GitHub → Repo `sj11n/myemmel` → Settings → Secrets and variables → Actions → *New repository secret*:

| Secret | Inhalt |
|---|---|
| `STRATO_SFTP_HOST` | Hostname aus dem STRATO-Login |
| `STRATO_SFTP_USER` | Benutzername (beginnt mit `su…`) |
| `STRATO_SFTP_PASSWORD` | SFTP-Passwort |
| `STRATO_THEME_PATH` | Pfad zum Theme-Ordner auf dem Webspace (siehe oben; relativ zum SFTP-Stammverzeichnis) |

Passwörter nie in den Chat oder ins Repo schreiben.

3. In WordPress: Plugin **Koko Analytics** installieren; „Use cookie to determine unique visitors“ ausschalten, eingeloggte Admins ausschließen. Kommentare und Pingbacks deaktivieren.

## Arbeitsablauf

Änderungen immer auf einem Branch, per Pull Request nach `main`. Der Merge löst das Deployment aus.

## Vor dem Go-Live

- Rechtstexte: Telefonnummer, STRATO-Log-Aufbewahrung, Datum eintragen
- Browser-Network-Tab: keine externen Requests, keine Cookies
- Coming-Soon-Seite entfernen
