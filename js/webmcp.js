/**
 * WebMCP tool surface for anthony.bible.
 *
 * Exposes site-level actions to agents running in WebMCP-capable browsers
 * via navigator.modelContext.provideContext(). No-op in browsers without
 * the API.
 *
 * Spec: https://webmachinelearning.github.io/webmcp/
 */
(function () {
  'use strict';

  if (!('modelContext' in navigator) ||
      typeof navigator.modelContext.provideContext !== 'function') {
    return;
  }

  function setFieldValue(el, value) {
    const proto = el.tagName === 'TEXTAREA'
      ? window.HTMLTextAreaElement.prototype
      : window.HTMLInputElement.prototype;
    const setter = Object.getOwnPropertyDescriptor(proto, 'value').set;
    setter.call(el, value);
    el.dispatchEvent(new Event('input',  { bubbles: true }));
    el.dispatchEvent(new Event('change', { bubbles: true }));
  }

  const tools = [
    {
      name: 'open_section',
      description: 'Scroll the homepage to one of its sections: platform, foundations, about, or contact.',
      inputSchema: {
        type: 'object',
        properties: {
          section: {
            type: 'string',
            enum: ['platform', 'foundations', 'about', 'contact']
          }
        },
        required: ['section']
      },
      execute: async ({ section }) => {
        const el = document.getElementById(section);
        if (!el) return { ok: false, error: `Section not found: ${section}` };
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        return { ok: true, url: `${location.origin}${location.pathname}#${section}` };
      }
    },
    {
      name: 'fill_contact_form',
      description: 'Fill the contact form on the homepage with the supplied fields. Does not submit; the user reviews and clicks Send.',
      inputSchema: {
        type: 'object',
        properties: {
          name:    { type: 'string', description: 'Sender name' },
          email:   { type: 'string', description: 'Sender email' },
          phone:   { type: 'string', description: 'Sender phone' },
          message: { type: 'string', description: 'Message body' }
        },
        required: ['name', 'email', 'message']
      },
      execute: async ({ name, email, phone, message }) => {
        const form = document.getElementById('contactForm');
        if (!form) return { ok: false, error: 'Contact form not on this page' };
        const fields = { name, email, phone: phone ?? '', message };
        for (const [id, value] of Object.entries(fields)) {
          const el = document.getElementById(id);
          if (el && value !== undefined) setFieldValue(el, value);
        }
        document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth' });
        return { ok: true, note: 'Fields populated. User must press Send to submit.' };
      }
    },
    {
      name: 'submit_contact_form',
      description: 'Submit the contact form. Use after fill_contact_form, and only with explicit user consent.',
      inputSchema: { type: 'object', properties: {}, required: [] },
      execute: async () => {
        const btn = document.getElementById('contactFormSubmit');
        if (!btn) return { ok: false, error: 'Submit button not on this page' };
        btn.click();
        return { ok: true };
      }
    }
  ];

  try {
    navigator.modelContext.provideContext({ tools });
  } catch (err) {
    console.warn('[webmcp] provideContext failed:', err);
  }
})();
