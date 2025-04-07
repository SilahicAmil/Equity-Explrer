# ✅ Equity Explorer Sandbox - MVP Checklist

**Goal:** Functional trading simulator with portfolio tracking, job queue processing, and basic UI/UX  
**MVP Deadline:** TBD

---

## 🔹 1. Core Setup

**Priority:** HIGH

- [x] Laravel + React project scaffolded
- [x] Auth (login/signup) using Laravel Breeze or Jetstream
- [x] DB tables: `users`, `stocks`, `portfolios`, `trades`, `jobs`, `stock_price_histories`
- [x] Queue system set up (using `database` driver for now)
- [x] Cron job running `php artisan queue:work`

---

## 🔹 2. Trade Job Logic

**Priority:** HIGH

### Buy Order Logic

- [ ] Validate funds available
- [ ] Add stock to portfolio (or update quantity/avg price)
- [ ] Create trade record in `trades` table
- [ ] Use DB transactions to prevent race conditions

### Sell Order Logic

- [ ] Validate stock quantity available
- [ ] Subtract from portfolio, calculate PnL
- [ ] Create trade record
- [ ] Use DB transactions

### Trade Processing Job

- [ ] One worker → one job at a time
- [ ] Mark job as `completed` or `failed`
- [ ] Push notification/email after job finishes

---

## 🔹 3. Portfolio & Trade History

**Priority:** HIGH

- [ ] **Portfolio View (React):**

  - [ ] Table of stocks: symbol, quantity, avg cost, current price, unrealized PnL

- [ ] **Trade History View:**

  - [ ] Table of past trades: type (buy/sell), symbol, quantity, price, timestamp

- [ ] **API Routes:**
  - [ ] `GET /api/portfolio`
  - [ ] `GET /api/trades`
  - [ ] `POST /api/trade`

---

## 🔹 4. Stock Price Handling

**Priority:** MEDIUM

- [ ] Job to periodically update stock prices (every 15 min?)
- [ ] Use mock price generator or static JSON
- [ ] Store in `stock_price_histories`
- [ ] Use latest price when viewing portfolio or executing trade

---

## 🔹 5. Basic Notifications

**Priority:** MEDIUM

- [ ] On successful trade:

  - [ ] Simple in-app alert (Alpine.js or Laravel events)
  - [ ] (Optional) Email confirmation

- [ ] Queue job for notifications
- [ ] Show visual toast/alert when job completes

---

## 🔹 6. Job Monitoring & Failures

**Priority:** HIGH

- [ ] Retry failed jobs with `--tries=3`
- [ ] Monitor with `queue:failed`, `queue:retry`
- [ ] Add basic exception handling/logging to trade jobs

---

## 🔹 7. UI/UX Basics (React)

**Priority:** HIGH

- [ ] Dashboard layout: Sidebar (Portfolio, Trades), Main View
- [ ] Stock selection interface
- [ ] Trade Form: Buy/Sell dropdown, quantity input
- [ ] Clean table views (React Table / TanStack)

---

## 🔹 8. Security & Validation

**Priority:** HIGH

- [ ] Strong validation on trade inputs
- [ ] CSRF protection
- [ ] Prevent duplicate orders/spamming

---

## 🔹 9. Deployment (Optional for MVP)

**Priority:** LOW-MEDIUM

- [ ] Deploy with Laravel Forge or shared hosting
- [ ] SQLite/MySQL with minimal config
- [ ] Optionally deploy React frontend with Vite on same server
