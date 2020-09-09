import { writable, readable } from 'svelte/store';

export const id = readable(CFStore.id);
export const sections = readable(CFStore.sections);
export const activeSection = writable(null)
export const values = writable(CFStore.values);
export const defaults = readable(CFStore.defaults);
export const errors = writable(CFStore.errors);
export const menu = readable(CFStore.menu);
export const titles = readable(CFStore.titles);
export const translation = readable(CFStore.translation);
export const nonce = readable(CFStore.nonce);
export const notifications = writable([]);