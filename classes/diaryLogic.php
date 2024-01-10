<?php
require_once '../dbconnect.php';

class DiaryLogic
{
    /**
     * 投稿する
     * @param array $diaryData
     * @return bool $result
     */
    public static function createDiary($diaryData)
    {
        $result = false;
        $sql = 'INSERT INTO diary (user_id, text, date) VALUES (?, ?, ?)';
        $arr = [$diaryData['user_id'], $diaryData['text'], $diaryData['date']];

        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result; // 成功時には true を返す
        } catch (Exception $e) {
            echo $e;
            return false; // 失敗時には false を返す
        }
    }

    /**
     * 記録表示処理
     * @param int $user_id
     * @return array|bool $diary|false
     */
    public static function diaryView($user_id)
    {
        // ユーザの日記を取得
        $diary = self::getDiary($user_id);

        if (!$diary) {
            $_SESSION['msg'] = '日記がありません。';
            return false;
        } else {
            return $diary;
        }
    }

    /**
     * user_idから過去の記録を取得
     * @param int $user_id
     * @return array|bool $diary|false
     */
    public static function getDiary($user_id)
    {
        $sql = 'SELECT * FROM diary WHERE user_id = ?';
        $arr = [$user_id];

        try {
            $stmt = connect()->prepare($sql);
            $stmt->execute($arr);
            $diary = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $diary;
        } catch (\Exception $e) {
            return false;
        }
    }
}
?>