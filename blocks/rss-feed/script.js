(() => {
  const blockName = 'mailchimp/newsletter-list'

  const el = window.wp.element.createElement
  const registerBlockType = window.wp.blocks.registerBlockType
  const Fields = wp.components

  const iconEl = el('svg', { width: 20, height: 20, viewBox: '0 0 448 512' },
    el('path', { d: "M330.6 243.5a36.2 36.2 0 0 1 9.3 0c1.7-3.8 2-10.4 .5-17.6-2.2-10.7-5.3-17.1-11.5-16.1s-6.5 8.7-4.2 19.4c1.3 6 3.5 11.1 6 14.3zM277.1 252c4.5 2 7.2 3.3 8.3 2.1 1.9-1.9-3.5-9.4-12.1-13.1a31.4 31.4 0 0 0 -30.6 3.7c-3 2.2-5.8 5.2-5.4 7.1 .9 3.7 10-2.7 22.6-3.5 7-.4 12.8 1.8 17.3 3.7zm-9 5.1c-9.1 1.4-15 6.5-13.5 10.1 .9 .3 1.2 .8 5.2-.8a37 37 0 0 1 18.7-2c2.9 .3 4.3 .5 4.9-.5 1.5-2.2-5.7-8-15.4-6.9zm54.2 17.1c3.4-6.9-10.9-13.9-14.3-7s10.9 13.9 14.3 7zm15.7-20.5c-7.7-.1-8 15.8-.3 15.9s8-15.8 .3-16zm-218.8 78.9c-1.3 .3-6 1.5-8.5-2.4-5.2-8 11.1-20.4 3-35.8-9.1-17.5-27.8-13.5-35.1-5.5-8.7 9.6-8.7 23.5-5 24.1 4.3 .6 4.1-6.5 7.4-11.6a12.8 12.8 0 0 1 17.9-3.7c11.6 7.6 1.4 17.8 2.3 28.6 1.4 16.7 18.4 16.4 21.6 9a2.1 2.1 0 0 0 -.2-2.3c0 .9 .7-1.3-3.4-.4zm299.7-17.1c-3.4-11.7-2.6-9.2-6.8-20.5 2.5-3.7 15.3-24-3.1-43.3-10.4-10.9-33.9-16.5-41.1-18.5-1.5-11.4 4.7-58.7-21.5-83 20.8-21.6 33.8-45.3 33.7-65.7-.1-39.2-48.2-51-107.4-26.5l-12.6 5.3c-.1-.1-22.7-22.3-23.1-22.6C169.5-18-41.8 216.8 25.8 273.9l14.8 12.5a72.5 72.5 0 0 0 -4.1 33.5c3.4 33.4 36 60.4 67.5 60.4 57.7 133.1 267.9 133.3 322.3 3 1.7-4.5 9.1-24.6 9.1-42.4s-10.1-25.3-16.5-25.3zm-316 48.2c-22.8-.6-47.5-21.2-49.9-45.5-6.2-61.3 74.3-75.3 84-12.3 4.5 29.6-4.7 58.5-34.1 57.8zM84.3 249.6C69.1 252.5 55.8 261.1 47.6 273c-4.9-4.1-14-12-15.6-15-13-24.9 14.2-73 33.3-100.2C112.4 90.6 186.2 39.7 220.4 48.9c5.6 1.6 23.9 22.9 23.9 22.9s-34.2 18.9-65.8 45.4c-42.7 32.9-74.9 80.6-94.2 132.4zM323.2 350.7s-35.7 5.3-69.5-7.1c6.2-20.2 27 6.1 96.4-13.8 15.3-4.4 35.4-13 51-25.4a102.9 102.9 0 0 1 7.1 24.3c3.7-.7 14.3-.5 11.4 18.1-3.3 19.9-11.7 36-25.9 50.8A106.9 106.9 0 0 1 362.6 421a132.5 132.5 0 0 1 -20.3 8.6c-53.5 17.5-108.3-1.7-126-43a66.3 66.3 0 0 1 -3.6-9.7c-7.5-27.2-1.1-59.8 18.8-80.4 1.2-1.3 2.5-2.9 2.5-4.8a8.5 8.5 0 0 0 -1.9-4.5c-7-10.1-31.2-27.4-26.3-60.8 3.5-24 24.5-40.9 44.1-39.9l5 .3c8.5 .5 15.9 1.6 22.9 1.9 11.7 .5 22.2-1.2 34.6-11.6 4.2-3.5 7.6-6.5 13.3-7.5a17.5 17.5 0 0 1 13.6 2.2c10 6.6 11.4 22.7 11.9 34.5 .3 6.7 1.1 23 1.4 27.6 .6 10.7 3.4 12.2 9.1 14 3.2 1.1 6.2 1.8 10.5 3.1 13.2 3.7 21 7.5 26 12.3a16.4 16.4 0 0 1 4.7 9.3c1.6 11.4-8.8 25.4-36.3 38.2-46.7 21.7-93.7 14.5-100.5 13.7-20.2-2.7-31.6 23.3-19.6 41.2 22.6 33.4 122.4 20 151.4-21.4 .7-1 .1-1.6-.7-1-41.8 28.6-97.1 38.2-128.5 26-4.8-1.9-14.7-6.4-15.9-16.7 43.6 13.5 71 .7 71 .7s2-2.8-.6-2.5zm-68.5-5.7zm-83.4-187.5c16.7-19.4 37.4-36.2 55.8-45.6a.7 .7 0 0 1 1 1c-1.5 2.7-4.3 8.3-5.2 12.7a.8 .8 0 0 0 1.2 .8c11.5-7.8 31.5-16.2 49-17.3a.8 .8 0 0 1 .5 1.4 41.9 41.9 0 0 0 -7.7 7.7 .8 .8 0 0 0 .6 1.2c12.3 .1 29.7 4.4 41 10.7 .8 .4 .2 1.9-.6 1.7-69.6-15.9-123.1 18.5-134.5 26.8a.8 .8 0 0 1 -1-1.1z" } )
  );

  // Register the block
  registerBlockType(blockName, {
    title: 'Newsletter Archive',
    edit: function ({ attributes }) {
      setTimeout(() => loadEvents(), 2000)
      return el('div', {
        'data-get-mc-newsletter-list': 'true',
      }, 'loading...')
    },
    save: function () {
      return null
    },
    icon: iconEl
  })


  const loadEvents = (attributes) => {
    const newsletterListWrappers = document.querySelectorAll('[data-get-mc-newsletter-list]')
    newsletterListWrappers.forEach((wrapper) => {
      fetch(`${window.wpApiSettings.root}mailchimp/newsletter-render`)
        .then((blob) => blob.text())
        .then((data) => {
          wrapper.innerHTML = data
          const innerLinks = wrapper.querySelectorAll('a')
          innerLinks.forEach((link) => link.removeAttribute('href'))
        })
    })
  }
})()