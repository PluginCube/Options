<script>
    import { notifications } from 'store'

    import { fade, fly } from 'svelte/transition'

    import { removeNotification } from 'methods'
</script>

<style lang="scss">
    ul {
        z-index: 9999999;
        margin: 0;
        padding: 0;
        transition: all 0.3s;
        position: fixed;
        float: right;
        right: 30px;
        top: 65px;
        width: fit-content;
            
        li {
            border-radius: 3px;
            text-align: center;
            font-weight: 700;
            line-height: 36px;
            z-index: 9999999;
            display: block;
            width: fit-content;
            padding-left: 15px;
            overflow: hidden;
            top: 0;
            right: 0;

            span {
                margin-right: 15px;
            }

            i {
                font-size: 12px;
                line-height: inherit;
                cursor: pointer;
                width: 36px;
                height: inherit;
                background: #00000010;
            }

            &.success {
                background: #d4ebdc;
                color: #219b4a;
            }

            &.error {
                background: #f1dfdf;
                color: #c84f4f;
            }

            &.info {
                background: #dce3e9;
                color: #6d7e97;
            }
        }
    }
</style>

<ul>
    {#each $notifications as notification}
        <li in:fly={{ x: 15, duration: 500 }} out:fade class={notification.style}>
            <span> {notification.message} </span>
        
            <i
                class="dashicons dashicons-dismiss"
                on:click={() => removeNotification(notification.id)}
            />
        </li>
    {/each}
</ul>