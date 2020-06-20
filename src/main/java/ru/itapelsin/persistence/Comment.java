package ru.itapelsin.persistence;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.ManyToOne;
import java.time.Instant;

@Entity
@Getter
@Setter
public class Comment extends AbstractEntity {

    @ManyToOne(optional = false)
    private Offer offer;

    @ManyToOne(optional = false)
    private Account author;

    @Column(nullable = false)
    private Instant instant;

    private String text;
}
