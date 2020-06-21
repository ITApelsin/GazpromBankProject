package ru.itapelsin.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import ru.itapelsin.persistence.Comment;

public interface CommentRepository extends JpaRepository<Comment, Long> {
}
