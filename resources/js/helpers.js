import {router} from "@inertiajs/vue3";
import Zooming from "zooming";
export function replaceHtmlLinksToInertiaLinks(target) {
    const links = $(target).find('a');

    Array.from(links).forEach(link => {
        link.addEventListener('click', function (e) {

            const url = e.currentTarget.href;

            if (checkIsInternalURL(url)) {
                e.preventDefault();
                if (e.currentTarget.getAttribute('data-method')) {
                    router.delete(url, {preserveState: false});
                } else {
                    router.get(url);
                }
            } else {
                return true;
            }
        }, true)
    });
}

export function checkIsInternalURL(url)
{
    return url === null ? false : (url.includes(import.meta.env.VITE_APP_URL) && !url.includes('storage') );
}

export function zoomImages()
{
    new Zooming().listen('img');
}

export function wrapTables(target, wrapClass="table-wrapper")
{
    $(`${target} table`).wrap('<div class="'+wrapClass+'"></div>');
}
