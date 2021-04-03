<script>
    import { titles, display_version } from 'store'

    import Notifications from "./Notifications"

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
                letter-spacing: -0.1px;
            }

            span {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 7px 10px 6px 10px;
                margin-left: 18px;
                background: #00000010;
                border-radius: 3px;
                color: var(--pco-primary-text);
                font-family: Consolas, monospace;
                text-transform: uppercase;
                font-weight: bold;
                font-size: 11px;
                line-height: 12px;
                margin-top: -5px;
                letter-spacing: 1px;
            }
        }
    }
</style>

<header>
    <div>
        <h1>{$titles.page}</h1>
        <span>{$display_version}</span>
    </div>

    <Notifications />
</header>