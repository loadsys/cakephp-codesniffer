<?php
echo implode('', array_map('chr', array_map('hexdec', array_filter([0, 1, 2, 3]))));
