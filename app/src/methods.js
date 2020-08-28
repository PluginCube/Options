import { get } from 'svelte/store';
import * as store from 'store'

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
    let items = get(store.notifications);
    let id = Math.random().toString(36).substring(7);
    
    items = [...items, {message, id}];

    store.notifications.set(items);
}