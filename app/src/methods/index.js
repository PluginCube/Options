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
            store.errors.set(result.data.errors);

            pushNotification(get(store.translation).data_saved);
        } else {
            store.errors.set(result.data.errors);

            pushNotification(get(store.translation).validation_error, 'error');
        }

        return result;
    } catch (error) {
        pushNotification(get(store.translation).error, 'error');
    }
}

export const pushNotification = (message, style = 'success') => {
    let notifications = get(store.notifications);

    let id = Math.random().toString(36).substring(7);

    store.notifications.set([...notifications, {message, id, style}]);
    
    let timer = style == 'success' ? 3000: 6000;
    
    setTimeout(() => {
        removeNotification(id)
    }, timer);
}

export const removeNotification = (id) => {
    let items = get(store.notifications);
    
    items = items.filter(item => item.id !== id);

    store.notifications.set(items);
}

export const arrayMove = (arr, from, to) => {
    while (from < 0) {
        from += arr.length;
    }

    while (to < 0) {
        to += arr.length;
    }

    if (to >= arr.length) {
        var k = to - arr.length + 1;
        while (k--) {
            arr.push(undefined);
        }
    }
    
    arr.splice(to, 0, arr.splice(from, 1)[0]);
    
    return arr;
};
    
export const visiableFields = (fields, values) => {
    fields.sort(function (a, b) {
        return a.priority - b.priority;
    });

    return fields.filter(field => {
        if (field.condition) {
            let target = values[field.condition[0]];
            let operation = field.condition[1];
            let value = field.condition[2];

            return eval(`value ${operation} target`);
        }

        return true;
    });
}