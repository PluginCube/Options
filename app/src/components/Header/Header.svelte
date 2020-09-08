<script>
    import {titles, notifications} from 'store'
    import Notification from './Notification.svelte'
</script>

<style>
    h1 {
        color: var(--cf-primary-text);
        float: left;
        margin: 15px 0;
        line-height: normal;
        font-family: Josefin Sans,sans-serif;
        font-weight: bold;
        font-size: 27px;
    }

    ul {
        z-index: 9999999;
        margin: 0;
        padding: 0;
        transition: all .3s;
        position: fixed;
        float: right;
        width: inherit;
        right: 50px;
    }
</style>

<header>
    <h1>{$titles.page}</h1>

    <ul>
        {#each $notifications as item}
            <Notification {...item}/>
        {/each}
    </ul>
</header>