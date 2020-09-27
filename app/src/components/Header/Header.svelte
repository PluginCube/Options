<script>
    import { notifications } from 'store'

    import Notification from './Notification'
</script>

<style>
    ul {
        z-index: 9999999;
        margin: 0;
        padding: 0;
        transition: all 0.3s;
        position: fixed;
        float: right;
        width: inherit;
        right: 50px;
    }
</style>

<header>
    <ul>
        {#each $notifications as item}
            <Notification {...item} />
        {/each}
    </ul>
</header>