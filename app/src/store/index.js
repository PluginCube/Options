import { writable, readable } from 'svelte/store';
export const id = readable(PluginCubeOptions.id);
export const sections = readable(PluginCubeOptions.sections);
export const activeSection = writable(null)
export const values = writable(PluginCubeOptions.values);
export const defaults = readable(PluginCubeOptions.defaults);
export const errors = writable(PluginCubeOptions.errors);
export const menu = writable(PluginCubeOptions.menu);
export const translation = readable(PluginCubeOptions.translation);
export const nonce = readable(PluginCubeOptions.nonce);
export const notifications = writable([]);