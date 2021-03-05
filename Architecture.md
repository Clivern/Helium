<p align="center">
    <img alt="Logo" src="/public/static/logo.png?v=1.0.0" width="150" />
    <h3 align="center">Helium</h3>
    <p align="center">Fast, Secure and Reliable Newsletter System, Set up in Minutes.</p>
    <p align="center">
        <a href="https://github.com/ionsio/Helium/actions/workflows/php.yml">
            <img src="https://github.com/ionsio/Helium/actions/workflows/php.yml/badge.svg">
        </a>
        <a href="https://github.com/ionsio/Helium/blob/master/LICENSE">
            <img src="https://img.shields.io/badge/LICENSE-MIT-orange.svg">
        </a>
    </p>
</p>


### Newsletter Delivery

There three dynamic values, the `deliveryType`, `deliveryTime` and `deliveryStatus`. The user can set the values of `deliveryType` and `deliveryTime` while `deliveryStatus` is internal.

Here is the possbile values:

- `deliveryType == DRAFT`: the newsletter still not finished yet.
- `deliveryType == NOW`: Worker should start sending the newsletter right away.
- `deliveryType == SCHEDULED && deliveryTime is set`: Worker should start sending the newsletter when `deliveryTime` is reached.

- `deliveryStatus == ON_HOLD`: Newsletter sending is blocked. mostly if `deliveryType == DRAFT` or `deliveryType == SCHEDULED && deliveryTime is set`
- `deliveryStatus == PENDING`: Newsletter sending is pending to be picked by workers. mostly if `deliveryType == NOW`
- `deliveryStatus == IN_PROGRESS`: Newsletter sending is in progress.
- `deliveryStatus == FINISHED`: Newsletter has been sent to all enabled subscribers.


There is some rules about editing a newsletter during each delivery status.

- `deliveryStatus == ON_HOLD`: User can change anything.
- `deliveryStatus == PENDING`: Only `name`, `sender`, `template` and `inputs`. `deliveryType` can't change anymore.
- `deliveryStatus == IN_PROGRESS`: Only `name`, `sender`, `template` and `inputs`. `deliveryType` can't change anymore.
- `deliveryStatus == FINISHED`: Only `name`, `template` and `inputs`. `deliveryType` and `sender` can't change anymore.