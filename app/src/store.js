import { writable, readable } from 'svelte/store';

export const id = readable(CFStore.id);
export const loading = writable(false);
export const alerts = writable(CFStore.alerts);
export const sections = readable(CFStore.sections);
export const activeSection = writable(CFStore.sections[0]['id'])
export const values = writable(CFStore.values);
export const defaults = readable(CFStore.defaults);
export const errors = writable(CFStore.errors);
export const menu = readable(CFStore.menu);
export const titles = readable(CFStore.titles);
export const translation = readable(CFStore.translation);