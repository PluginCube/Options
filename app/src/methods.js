import * as store from 'store'
import { get } from 'svelte/store';

export const ajax = async (method, data = {}, type = 'POST') => {
    return await jQuery.ajax({
        url: ajaxurl,
        type: type,
        data: {
            action: 'cf',
            method: method,
            security: get(store.nonce),
            data: data    
        }
    });
}

export const save = async (values = false) => {
    let result;
    
    if (typeof values !== 'object') {
        values = get(store.values)
    }

    try {
        result = await ajax('save', {values: values});
        
        if (result.success) {
            store.values.set(result.data.values);

            pushNotification(get(store.translation).data_saved);
        } else {
            store.errors.set(result.data.errors);
        }

        return result;
    } catch (error) {
        console.log(error);

        pushNotification(get(store.translation).error);
    }
}

export const pushNotification = (message) => {
    let notifications = get(store.notifications);
    let id = Math.random().toString(36).substring(7);
    
    notifications = [...notifications, {message, id}];

    store.notifications.set(notifications);
}

export const removeNotification = (id) => {
    let items = get(store.notifications);
    
    items = items.filter(item => item.id !== id);

    store.notifications.set(items);
}