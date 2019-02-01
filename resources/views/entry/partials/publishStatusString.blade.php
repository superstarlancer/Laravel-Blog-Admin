<?php $format = $format ?? 'D, M j, Y H:i T' ?>
@if($entry->isPublic())
  Public since {{ $blog->convertToBlogTimezone($entry->getPublished())->format($format) }}
@elseif($entry->getPublished()->isFuture())
  Scheduled for publishing {{ $blog->convertToBlogTimezone($entry->getPublished())->format($format) }}
@else
  Not scheduled for publishing
@endif