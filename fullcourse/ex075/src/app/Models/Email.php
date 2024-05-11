<?php 
declare(strict_types=1);
namespace App\Models;

use App\Model;
use Symfony\Component\Mime\Address;
use App\Enums\EmailStatus;

class Email extends Model
{
    public function queue(
        Address $to,
        Address $from,
        string $subject,
        string $html,
        ?string $text = null
    ): void 
    {
        $stmt = $this->db->prepare(
            'INSERT INTO emails (subject, status, text_body, html_body, meta, created_at, sent_at) VALUES (?, ?, ?, ?, ?, NOW(), null)'
        );

        $meta['to'] = $to->toString();
        $meta['from'] = $from->toString();

        $stmt->execute([$subject, EmailStatus::Queue->value, $text, $html, json_encode($meta)]);
    }

    public function getEmailsByStatus(EmailStatus $status): array 
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM emails WHERE status = ?'
        );

        $stmt->execute([$status->value]);

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function markEmailSent(int $id):void 
    {
        $stmt = $this->db->prepare(
            'UPDATE emails SET status = ?, sent_at = NOW() WHERE id = ?'
        );

        $stmt->execute([EmailStatus::Sent->value, $id]);
    }
}