<script>
    export let id;
    export let style;
    export let message;

    import { fade, fly } from 'svelte/transition'
    import { removeNotification } from 'methods'

    let close = () => {
        removeNotification(id);
    }
</script>

<style>
    li {
        float: right;
        padding: 0 20px;
        border-radius: 22px;
        text-align: center;
        font-weight: 500;
        line-height: 35px;
    }

    span {
        margin-right: 10px;
    }

    i {
        font-size: 12px;
        line-height: inherit;
        cursor: pointer;
        margin-right: -5px;
    }

    li.success {
        background: #d4ebdc;
        color: #219b4a;
    }
    
    li.error {
        background: #f1dfdf;
        color: #c84f4f;
    }
    
    li.info {
        background: #dce3e9;
        color: #6d7e97;
    }
</style>

<li in:fly="{{ x: 15, duration: 500 }}" out:fade class={style}>
    <span>{message}</span>
    <i on:click={close} class="dashicons dashicons-dismiss"></i>
</li>