import './echo';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

// TODO: Uncomment when ready to setup websockets
// window.Pusher = Pusher;

// window.Echo = new Echo({
//   broadcaster: 'reverb',
//   key: import.meta.env.VITE_REVERB_APP_KEY, // Make sure this is set in .env
//   wsHost: import.meta.env.VITE_REVERB_HOST ?? window.location.hostname,
//   wsPort: import.meta.env.VITE_REVERB_PORT ?? 6001, // Default Reverb port
//   wssPort: import.meta.env.VITE_REVERB_PORT ?? 6001,
//   forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
//   enabledTransports: ['ws', 'wss'], // Enable WebSockets
// });
