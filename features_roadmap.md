# JobDock - Feature Roadmap & Checklist

This document serves as our project roadmap. We will use this checklist to implement advanced features one by one to make JobDock premium and fully featured for both Job Seekers (Employees) and Employers (Companies).

---

## 🗺️ Feature Checklist

### 1. 🟢 Application Status Tracking & Side Panel View
*Allows employers to view, update, and manage applicants in a compact table and right-to-left slide-over panel layout.*
*   **Target User:** Both (Employees & Companies)
*   **Priority:** High
*   **Status:** `[x] Completed`
*   **Implementation Details:**
    *   Added `status` column to the `applicants` table.
    *   Redesigned the dashboard to render a responsive `<table>` layout for job applications.
    *   Implemented Alpine.js powered right-to-left slide-over drawer panels displaying details and resume view links.
    *   Set up status update form submits inside the drawer panel, integrating session-based active drawer persistence on reload.

---

### 2. 🟢 Default Profile Resume Manager
*Allows employees to save a resume to their profile and reuse it instantly when applying to new jobs.*
*   **Target User:** Employees (Job Seekers)
*   **Priority:** Medium-High
*   **Status:** `[x] Completed`
*   **Implementation Details:**
    *   Added `resume_path` nullable string column to the `users` table via migration.
    *   Updated `ProfileController@update` to handle PDF upload to S3 (`resumes/` folder) and added a new `deleteResume` method.
    *   Added `DELETE /profile/resume` route (`profile.resume.delete`) in `web1.php`.
    *   Updated the **My Profile** dashboard panel to show the saved resume status, a "View" link, a "Replace" upload input, and a "Remove Saved Resume" button.
    *   Updated the **Apply Now** modal: if a profile resume exists, shows a "Use my saved profile resume" checkbox (checked by default) with an Alpine.js-toggled file upload for when the user wants to submit a different one.
    *   Updated `ApplicantController@store` to use the saved resume path when `use_saved_resume` is submitted and no file is uploaded.

---

### 3. 🟢 Advanced Search & Job Filters
*Enhances the job search page with filters for types, salary, and active tags.*
*   **Target User:** Employees (Job Seekers)
*   **Priority:** Medium
*   **Status:** `[x] Completed`
*   **Implementation Details:**
    *   Added a sticky filter sidebar to the `/jobs` page with Job Type checkboxes (Full-time, Part-time, Contract, Internship, Remote) and a Minimum Salary `$` number input.
    *   Checkboxes auto-submit the filter form on change via `onchange`; salary uses an "Apply Filters" button.
    *   Active filter count badge shown on the sidebar header.
    *   Updated `JobController@index` to delegate to `search()` when any filter params are present.
    *   Updated `JobController@search` to apply `whereIn('job_type', ...)` and `where('salary', '>=', ...)` filters dynamically. Filters persist across pagination via `withQueryString()`.

---

### 4. 🟢 Company Public Profiles
*Creates dedicated profile pages for companies to showcase all their job listings.*
*   **Target User:** Both (Companies & Employees)
*   **Priority:** Medium
*   **Status:** `[ ] Not Started`
*   **Implementation Steps:**
    *   Create a company profile view route (e.g., `/companies/{company_name}`).
    *   Design a dedicated page layout with the company logo, banner, bio, website link, and a list of all active jobs posted by that company.
    *   Make the company name clickable on all job listing cards/pages.

---

### 5. 🟢 Employer Action Center (Notes & Direct Emailing)
*Enables employers to add private evaluation notes on applicants and email them directly.*
*   **Target User:** Companies (Employers)
*   **Priority:** Low-Medium
*   **Status:** `[ ] Not Started`
*   **Implementation Steps:**
    *   Create an `applicant_notes` text column on the `applicants` table to store private company ratings.
    *   Create a simple text input overlay on the dashboard for employers to save/edit notes.
    *   Configure a mail template to send email updates (e.g., interview invites) to the applicant directly from the dashboard.

---

### 6. 🟢 Job Listing Status & Expiration Dates
*Allows companies to toggle job post states (Active, Draft, Closed).*
*   **Target User:** Companies (Employers)
*   **Priority:** Medium
*   **Status:** `[x] Completed`
*   **Implementation Details:**
    *   Added `status` string column (default `'active'`) to `job_listings` table via migration — all existing jobs remain visible automatically.
    *   Added `'status'` to `Job::$fillable` and a `scopePublic()` query scope (`where('status', 'active')`) for clean, reusable filtering.
    *   `JobController@index` and `@search` now apply `->public()` scope — draft/closed jobs are invisible to the public.
    *   Added `JobController@updateStatus` — a dedicated `PATCH /jobs/{job}/status` endpoint for the dashboard quick-toggle.
    *   **Employer Dashboard**: each job card now shows a colour-coded status badge (🟢 Active / 🟡 Draft / 🔴 Closed) and an inline dropdown that submits on change to instantly toggle status.
    *   **Create Job form**: added a "Publish Status" select (Active / Draft), defaulting to Active.
    *   **Edit Job form**: added a "Publish Status" select (Active / Draft / Closed) with the current value pre-selected.
