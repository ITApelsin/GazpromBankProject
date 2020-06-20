package ru.itapelsin.persistence;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.*;

@Entity
@Getter
@Setter
public class Rate extends AbstractEntity {

    @ManyToOne(optional = false)
    private Offer offer;

    @ManyToOne(optional = false)
    private Account account;

    @Enumerated(EnumType.STRING)
    @Column(length = 10, nullable = false)
    private RateType type;
}
