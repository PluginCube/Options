<script>
    import { notifications, titles, display_version } from 'store'

    import Notification from './Notification'
</script>

<style lang="scss">
    header {
        width: 100%;
        float: left;
    
        > div {
            display: flex;
            align-items: center;

            h1 {
                font-family: 'Josefin Sans';
                font-style: normal;
                font-weight: bold;
                font-size: 25px;
                line-height: 25px;
                margin: 0;
                padding: 0;
                color: var(--pco-primary-text);
            }

            span {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 7px 8px 7px 8px;
                margin-left: 15px;
                background: #00000013;
                border-radius: 3px;
                color: var(--pco-secondary-text);
                font-family: Consolas, monospace;
                font-weight: bold;
                font-size: 12px;
                line-height: 12px;
                margin-top: -4px;
            }
        }

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
    }
</style>

<header>
    <div>
        <h1>{$titles.page}</h1>
        <span>{$display_version}</span>
    </div>
    <ul>
        {#each $notifications as item}
            <Notification {...item} />
        {/each}
    </ul>
</header>