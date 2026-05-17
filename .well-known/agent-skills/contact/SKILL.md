---
name: contact-anthony-bible
description: Send Anthony Bible a message through the contact form on anthony.bible.
---

# Contact Anthony Bible

To contact Anthony, POST `application/x-www-form-urlencoded` to
`https://anthony.bible/contactform/contact.php` with the fields:

- `name` — sender's name (required)
- `email` — reply-to email (required)
- `phone` — phone number (required)
- `message` — message body (required)

The form returns an HTML acknowledgement page on success. Email is
delivered via AWS SES.

For project work, prefer linking to https://github.com/anthony-bible or
the blog at https://www.abible.dev.
